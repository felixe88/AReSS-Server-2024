<?php

namespace App\Controller;

use App\Service\ComuniService;
use Cake\Http\Response;
use MathPHP\Statistics\Distribution\ChiSquared;

class Chart1Controller extends AppController
{
    public function applyFormulas()
    {
        $comuniService = new ComuniService($this->Comuni);
        $allComuniData = $comuniService->getAllComuniData();

        // qui si richiamano le funzioni passando i parametri(il nostro data sarà $allComuniData da dove riceveremo tutti i dati)
        $estraiTotale = $this->estraiTotale("popolazione_eu", ['riferimento1', 'riferimento2'], $allComuniData);
        $calcoloWi = $this->calcoloWi(['riferimento1', 'riferimento2'], $allComuniData);
        // ... e così via per le altre funzioni

        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode(compact('estraiTotale', 'calcoloWi' /*, other function*/)));

        return $response;
    }

    public function handleFilters() {
        $filtri = $this->request->getData();

        // $this->set([
        //     'success' => true,
        //     '_serialize' => ['success']
        // ]);

        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode(compact('filtri')));

        return $response;
    }

    private function estraiTotale($colonna, $riferimenti, $data)
    {
        $container = [];

        foreach ($riferimenti as $riferimento) {
            $somma = 0;
            foreach ($data as $row) {
                if ($row->riferimento === $riferimento) {
                    $somma += $row->{$colonna};
                }
            }
            $container[$riferimento] = $somma;
        }

        return $container;
    }

    private function calcoloWi($riferimenti, $data)
    {
        $container = $this->estraiTotale("popolazione_eu", $riferimenti, $data);
        $dataset = [];

        foreach ($riferimenti as $riferimento) {
            $obj = [];
            foreach ($data as $riga) {
                if ($riga->riferimento === $riferimento) {
                    $obj[$riga->classe_eta] = $riga->popolazione_eu / $container[$riferimento];
                }
            }
            $container[$riferimento] = $obj;
        }

        return $container;
    }
    private function tassoStandard($riferimenti, $data, $k = 100000)
    {
        $wi = $this->calcoloWi($riferimenti, $data);
        $tassi = [];
        
        foreach ($riferimenti as $el) {
            $sommatoria = ['numeratore' => 0, 'denominatore' => 0];
            foreach ($data as $riga) {
                if ($riga->riferimento === $el) {
                    $righeClasse = array_filter($data, function ($r) use ($riga) {
                        return $r->classe_eta === $riga->classe_eta;
                    });
                    $casiTot = array_reduce($righeClasse, function ($sum, $e) {
                        return $sum + $e->numero_assoluto;
                    }, 0);
                    $popTot = array_reduce($righeClasse, function ($sum, $e) {
                        return $sum + $e->popolazione;
                    }, 0);
                    $ti = ($popTot !== 0) ? $casiTot / $popTot : 0;
                    $sommatoria['numeratore'] += $wi[$el][$riga->classe_eta] * $ti;
                    $sommatoria['denominatore'] += $wi[$el][$riga->classe_eta];
                }
            }
            $tassi[$el] = $sommatoria['denominatore'] !== 0 ? $sommatoria['numeratore'] / $sommatoria['denominatore'] : 0;
            $tassi[$el] = ($k !== 100000) ? $tassi[$el] * $k : round($tassi[$el] * $k, 2);
        }
        
        return $tassi;
    }

    private function calcoloEsLogTs($data, $riferimenti)
{
    $wi = $this->calcoloWi($riferimenti, $data);
    $tassi = $this->tassoStandard($riferimenti, $data, 1);
    $es = [];
    
    foreach ($riferimenti as $el) {
        $sommatoria = 0;
        foreach ($data as $riga) {
            if ($riga->riferimento === $el) {
                $valore = $riga->numero_assoluto / pow($riga->popolazione, 2);
                $sommatoria += pow($wi[$el][$riga->classe_eta], 2) * $valore;
            }
        }
        $sommatoria = sqrt($sommatoria);
        if ($sommatoria === 0 || $tassi[$el] === 0) {
            $es[$el] = 0;
        } else {
            $es[$el] = $sommatoria / $tassi[$el];
        }
    }
    
    return $es;
}

private function intervalloTs($riferimenti, $data)
{
    $tassi = $this->tassoStandard($riferimenti, $data, 1);
    $esLog = $this->calcoloEsLogTs($data, $riferimenti);
    $container = [];
    
    foreach ($riferimenti as $el) {
        $obj = ['tasso' => 0, 'lcl' => 0, 'ucl' => 0];
        $valore = 0;
        
        if ($tassi[$el] !== 0 && $esLog[$el] !== 0) {
            $valore = 1.96 * $esLog[$el];
        }
        
        $obj['lcl'] = max(0, exp(log($tassi[$el]) - $valore)) * 100000;
        $obj['ucl'] = min(1, exp(log($tassi[$el]) + $valore)) * 100000;
        $obj['tasso'] = $tassi[$el] * 100000;
        
        $container[$el] = $obj;
    }
    
    return $container;
}

private function tassoGrezzo($riferimenti, $data, $k = 100000)
{
    $casi = $this->estraiTotale("numero_assoluto", $riferimenti, $data);
    $popolazione = $this->estraiTotale("popolazione", $riferimenti, $data);
    $tasso = [];
    
    foreach ($riferimenti as $el) {
        if ($casi[$el] === 0) {
            $tasso[$el] = 0;
        } else {
            $tasso[$el] = $casi[$el] / $popolazione[$el];
            $tasso[$el] = ($k !== 100000) ? $tasso[$el] * $k : round($tasso[$el] * $k, 2);
        }
    }
    
    return $tasso;
}

private function intervalloTg($riferimenti, $data)
{
    $tassi = $this->tassoGrezzo($riferimenti, $data, 1);
    $popolazione = $this->estraiTotale("popolazione", $riferimenti, $data);
    $container = [];
    $sqrt = 0;

    foreach ($riferimenti as $el) {
        $obj = ['tasso' => 0, 'lcl' => 0, 'ucl' => 0];
        
        if ($tassi[$el] !== 0 && $popolazione[$el] !== 0) {
            $sqrt = sqrt($tassi[$el] / $popolazione[$el]);
        }

        $obj['lcl'] = max(0, $tassi[$el] - 1.96 * $sqrt) * 100000;
        $obj['ucl'] = min(1, $tassi[$el] + 1.96 * $sqrt) * 100000;
        $obj['tasso'] = $tassi[$el] * 100000;

        $container[$el] = $obj;
    }
    
    return $container;
}

private function sirRegionale($riferimenti, $data)
{
    $casiTotale = $this->estraiTotale("numero_assoluto", $riferimenti, $data);
    $classiEta = array_reduce($data, function ($l, $i) {
        return in_array($i->classe_eta, $l) ? $l : array_merge($l, [$i->classe_eta]);
    }, []);
    $container = [];
    
    foreach ($riferimenti as $riferimento) {
        $sommaAttesi = 0;
        
        foreach ($classiEta as $classe) {
            $datasetPuglia = array_filter($data, function ($d) use ($riferimento, $classe) {
                return $d->riferimento === 'Puglia' && $d->classe_eta === $classe;
            });

            $tasso = 0;
            $casiPuglia = array_reduce($datasetPuglia, function ($sum, $e) {
                return $sum + $e->numero_assoluto;
            }, 0);
            $popPuglia = array_reduce($datasetPuglia, function ($sum, $e) {
                return $sum + $e->popolazione;
            }, 0);

            if ($casiPuglia !== 0 && $popPuglia !== 0) {
                $tasso += $casiPuglia / $popPuglia;
            }

            $dataset = array_filter($data, function ($d) use ($riferimento, $classe) {
                return $d->riferimento === $riferimento && $d->classe_eta === $classe;
            });

            $popRif = array_reduce($dataset, function ($sum, $e) {
                return $sum + $e->popolazione;
            }, 0);

            $attesi = $tasso * $popRif;
            $sommaAttesi += $attesi;
        }

        $sir = 0;
        if ($sommaAttesi !== 0 && $casiTotale[$riferimento] !== 0) {
            $sir = round($casiTotale[$riferimento] / $sommaAttesi, 2);
        }

        $container[$riferimento] = [
            'sir' => $sir,
            'sommaAttesi' => $sommaAttesi
        ];
    }

    return $container;
}

private function intervalloSir($riferimenti, $data)
{
    $casiTotale = $this->estraiTotale("numero_assoluto", $riferimenti, $data);
    $sir = $this->sirRegionale($riferimenti, $data);
    $container = [];
    
    $chiSquared = new ChiSquared();

    foreach ($riferimenti as $riferimento) {
        $denominatore = $sir[$riferimento]["sommaAttesi"] * 2;
        $lclNum = $chiSquared->inverseProbability(0.025, $casiTotale[$riferimento] * 2);
        $uclNum = $chiSquared->inverseProbability(0.975, $casiTotale[$riferimento] * 2);
        $lcl = 0;
        $ucl = 0;

        if ($denominatore !== 0 && $lclNum !== 0 && $uclNum !== 0) {
            $lcl = round($lclNum / $denominatore, 2);
            $ucl = round($uclNum / $denominatore, 2);
        }

        $container[$riferimento] = [
            'tasso' => $sir[$riferimento]["sir"],
            'lcl' => $lcl,
            'ucl' => $ucl
        ];
    }

    return $container;
}


}
