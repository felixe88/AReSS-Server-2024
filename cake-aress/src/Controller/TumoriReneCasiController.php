<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriReneCasi Controller
 *
 * @property \App\Model\Table\TumoriReneCasiTable $TumoriReneCasi
 * @method \App\Model\Entity\TumoriReneCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriReneCasiController extends AppController
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

        $tumoriReneCasi = $this->paginate($this->TumoriReneCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriReneCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Rene Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriReneCasi = $this->TumoriReneCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriReneCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriReneCasi = $this->TumoriReneCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriReneCasi = $this->TumoriReneCasi->patchEntity($tumoriReneCasi, $this->request->getData());
            if ($this->TumoriReneCasi->save($tumoriReneCasi)) {
                $this->Flash->success(__('The tumori rene casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori rene casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriReneCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Rene Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriReneCasi = $this->TumoriReneCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriReneCasi = $this->TumoriReneCasi->patchEntity($tumoriReneCasi, $this->request->getData());
            if ($this->TumoriReneCasi->save($tumoriReneCasi)) {
                $this->Flash->success(__('The tumori rene casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori rene casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriReneCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Rene Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriReneCasi = $this->TumoriReneCasi->get($id);
        if ($this->TumoriReneCasi->delete($tumoriReneCasi)) {
            $this->Flash->success(__('The tumori rene casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori rene casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
