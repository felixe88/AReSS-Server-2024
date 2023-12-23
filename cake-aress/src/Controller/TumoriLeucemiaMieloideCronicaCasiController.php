<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriLeucemiaMieloideCronicaCasi Controller
 *
 * @property \App\Model\Table\TumoriLeucemiaMieloideCronicaCasiTable $TumoriLeucemiaMieloideCronicaCasi
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriLeucemiaMieloideCronicaCasiController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $limit = $this->request->getQuery('limit', 100000); // Dimensione predefinita della pagina
        $page = $this->request->getQuery('page', 1); // Numero di pagina predefinito
    
        $this->paginate = ['limit' => $limit,
                            'maxLimit' => 150000,
                            'page' => $page];
        $tumoriLeucemiaMieloideCronicaCasi = $this->paginate($this->TumoriLeucemiaMieloideCronicaCasi);

        $this->set(compact('tumoriLeucemiaMieloideCronicaCasi'));
        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriLeucemiaMieloideCronicaCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Leucemia Mieloide Cronica Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriLeucemiaMieloideCronicaCasi = $this->TumoriLeucemiaMieloideCronicaCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriLeucemiaMieloideCronicaCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriLeucemiaMieloideCronicaCasi = $this->TumoriLeucemiaMieloideCronicaCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriLeucemiaMieloideCronicaCasi = $this->TumoriLeucemiaMieloideCronicaCasi->patchEntity($tumoriLeucemiaMieloideCronicaCasi, $this->request->getData());
            if ($this->TumoriLeucemiaMieloideCronicaCasi->save($tumoriLeucemiaMieloideCronicaCasi)) {
                $this->Flash->success(__('The tumori leucemia mieloide cronica casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori leucemia mieloide cronica casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLeucemiaMieloideCronicaCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Leucemia Mieloide Cronica Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriLeucemiaMieloideCronicaCasi = $this->TumoriLeucemiaMieloideCronicaCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriLeucemiaMieloideCronicaCasi = $this->TumoriLeucemiaMieloideCronicaCasi->patchEntity($tumoriLeucemiaMieloideCronicaCasi, $this->request->getData());
            if ($this->TumoriLeucemiaMieloideCronicaCasi->save($tumoriLeucemiaMieloideCronicaCasi)) {
                $this->Flash->success(__('The tumori leucemia mieloide cronica casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori leucemia mieloide cronica casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLeucemiaMieloideCronicaCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Leucemia Mieloide Cronica Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriLeucemiaMieloideCronicaCasi = $this->TumoriLeucemiaMieloideCronicaCasi->get($id);
        if ($this->TumoriLeucemiaMieloideCronicaCasi->delete($tumoriLeucemiaMieloideCronicaCasi)) {
            $this->Flash->success(__('The tumori leucemia mieloide cronica casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori leucemia mieloide cronica casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
