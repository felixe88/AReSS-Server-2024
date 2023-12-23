<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriLeucemiaMieloideAcutaCasi Controller
 *
 * @property \App\Model\Table\TumoriLeucemiaMieloideAcutaCasiTable $TumoriLeucemiaMieloideAcutaCasi
 * @method \App\Model\Entity\TumoriLeucemiaMieloideAcutaCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriLeucemiaMieloideAcutaCasiController extends AppController
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
        $tumoriLeucemiaMieloideAcutaCasi = $this->paginate($this->TumoriLeucemiaMieloideAcutaCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriLeucemiaMieloideAcutaCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Leucemia Mieloide Acuta Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriLeucemiaMieloideAcutaCasi = $this->TumoriLeucemiaMieloideAcutaCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriLeucemiaMieloideAcutaCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriLeucemiaMieloideAcutaCasi = $this->TumoriLeucemiaMieloideAcutaCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriLeucemiaMieloideAcutaCasi = $this->TumoriLeucemiaMieloideAcutaCasi->patchEntity($tumoriLeucemiaMieloideAcutaCasi, $this->request->getData());
            if ($this->TumoriLeucemiaMieloideAcutaCasi->save($tumoriLeucemiaMieloideAcutaCasi)) {
                $this->Flash->success(__('The tumori leucemia mieloide acuta casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori leucemia mieloide acuta casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLeucemiaMieloideAcutaCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Leucemia Mieloide Acuta Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriLeucemiaMieloideAcutaCasi = $this->TumoriLeucemiaMieloideAcutaCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriLeucemiaMieloideAcutaCasi = $this->TumoriLeucemiaMieloideAcutaCasi->patchEntity($tumoriLeucemiaMieloideAcutaCasi, $this->request->getData());
            if ($this->TumoriLeucemiaMieloideAcutaCasi->save($tumoriLeucemiaMieloideAcutaCasi)) {
                $this->Flash->success(__('The tumori leucemia mieloide acuta casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori leucemia mieloide acuta casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLeucemiaMieloideAcutaCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Leucemia Mieloide Acuta Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriLeucemiaMieloideAcutaCasi = $this->TumoriLeucemiaMieloideAcutaCasi->get($id);
        if ($this->TumoriLeucemiaMieloideAcutaCasi->delete($tumoriLeucemiaMieloideAcutaCasi)) {
            $this->Flash->success(__('The tumori leucemia mieloide acuta casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori leucemia mieloide acuta casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
