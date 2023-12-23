<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriMammellaCasi Controller
 *
 * @property \App\Model\Table\TumoriMammellaCasiTable $TumoriMammellaCasi
 * @method \App\Model\Entity\TumoriMammellaCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriMammellaCasiController extends AppController
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
        $tumoriMammellaCasi = $this->paginate($this->TumoriMammellaCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriMammellaCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Mammella Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriMammellaCasi = $this->TumoriMammellaCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriMammellaCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriMammellaCasi = $this->TumoriMammellaCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriMammellaCasi = $this->TumoriMammellaCasi->patchEntity($tumoriMammellaCasi, $this->request->getData());
            if ($this->TumoriMammellaCasi->save($tumoriMammellaCasi)) {
                $this->Flash->success(__('The tumori mammella casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori mammella casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriMammellaCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Mammella Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriMammellaCasi = $this->TumoriMammellaCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriMammellaCasi = $this->TumoriMammellaCasi->patchEntity($tumoriMammellaCasi, $this->request->getData());
            if ($this->TumoriMammellaCasi->save($tumoriMammellaCasi)) {
                $this->Flash->success(__('The tumori mammella casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori mammella casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriMammellaCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Mammella Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriMammellaCasi = $this->TumoriMammellaCasi->get($id);
        if ($this->TumoriMammellaCasi->delete($tumoriMammellaCasi)) {
            $this->Flash->success(__('The tumori mammella casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori mammella casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
