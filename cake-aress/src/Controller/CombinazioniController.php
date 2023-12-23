<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Combinazioni Controller
 *
 * @property \App\Model\Table\CombinazioniTable $Combinazioni
 * @method \App\Model\Entity\Combinazioni[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CombinazioniController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $combinazioni = $this->paginate($this->Combinazioni);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('combinazioni')));
    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Combinazioni id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $combinazioni = $this->Combinazioni->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('combinazioni'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $combinazioni = $this->Combinazioni->newEmptyEntity();
        if ($this->request->is('post')) {
            $combinazioni = $this->Combinazioni->patchEntity($combinazioni, $this->request->getData());
            if ($this->Combinazioni->save($combinazioni)) {
                $this->Flash->success(__('The combinazioni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The combinazioni could not be saved. Please, try again.'));
        }
        $this->set(compact('combinazioni'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Combinazioni id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $combinazioni = $this->Combinazioni->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $combinazioni = $this->Combinazioni->patchEntity($combinazioni, $this->request->getData());
            if ($this->Combinazioni->save($combinazioni)) {
                $this->Flash->success(__('The combinazioni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The combinazioni could not be saved. Please, try again.'));
        }
        $this->set(compact('combinazioni'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Combinazioni id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $combinazioni = $this->Combinazioni->get($id);
        if ($this->Combinazioni->delete($combinazioni)) {
            $this->Flash->success(__('The combinazioni has been deleted.'));
        } else {
            $this->Flash->error(__('The combinazioni could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // public function riempiColonne()
    // {
    //     $classiTable = $this->getTableLocator()->get('classi');
    //     $comuniTable = $this->getTableLocator()->get('comuni');
    //     $comunePopolazioneTumoriTestTable = $this->getTableLocator()->get('ComunePopolazioneTumoriTest');
    //     $patologieTable = $this->getTableLocator()->get('patologie');
    //     $tabellaVuotaTable = $this->getTableLocator()->get('combinazioni');

    //     // Distinct sugli anni e sulle classi di età
    //     $classi = $classiTable->find()->distinct(['classe_eta'])->toArray();
    //     $comuni = $comuniTable->find()->toArray();
    //     $anniSesso = $comunePopolazioneTumoriTestTable->find()->distinct(['anno', 'sesso'])->toArray();
    //     $patologie = $patologieTable->find()->distinct(['patologia'])->toArray();

    //     $tabellaVuotaTable->getConnection()->begin();

    //     try {
    //         foreach ($classi as $classe) {
    //             foreach ($comuni as $comune) {
    //                 foreach ($anniSesso as $annoSesso) {
    //                     foreach ($patologie as $patologia) {
    //                         $tabellaVuotaTable->save($tabellaVuotaTable->newEntity([
    //                             'classe_eta' => $classe->campo_classe_eta,
    //                             'comune' => $comune->nome,
    //                             'anno' => $annoSesso->anno,
    //                             'sesso' => $annoSesso->sesso,
    //                             'patologia' => $patologia->campo_patologia,
    //                         ]), ['atomic' => false]);
    //                     }
    //                 }
    //             }
    //         }
    //         debug($comune);
    //         $tabellaVuotaTable->getConnection()->commit();
    //     } catch (\Exception $e) {
    //         $tabellaVuotaTable->getConnection()->rollback();
    //         throw $e;
    //     }
    // }
}
