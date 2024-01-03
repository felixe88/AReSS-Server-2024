<?php

namespace App\Service;

use App\Model\Table\ComuniTable;

class ComuniService
{
    private $comuniTable;
    private $comuniData;

    public function __construct(ComuniTable $comuniTable)
    {
        $this->comuniTable = $comuniTable;
        $this->loadComuniData();
    }

    private function loadComuniData()
    {
        $this->comuniData = $this->comuniTable->find()
            ->select([
                'Descrizione',
                'Distretti.Descrizione',
                'Asl.Descrizione',
                'Asl.IDAsl',
                'ComunePopolazioneTumoriTest.sesso',
                'ComunePopolazioneTumoriTest.popolazione'
            ])
            ->contain([
                'Distretti.Asl',
                'ComunePopolazioneTumoriTest'
            ])
            ->toArray();
    }

    public function getAllComuniData()
    {
        return $this->comuniData;
    }

}
