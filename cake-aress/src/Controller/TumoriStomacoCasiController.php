<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriStomacoCasi Controller
 *
 * @property \App\Model\Table\TumoriStomacoCasiTable $TumoriStomacoCasi
 * @method \App\Model\Entity\TumoriStomacoCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriStomacoCasiController extends AppController
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

        $tumoriStomacoCasi = $this->paginate($this->TumoriStomacoCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriStomacoCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Stomaco Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriStomacoCasi = $this->TumoriStomacoCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriStomacoCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriStomacoCasi = $this->TumoriStomacoCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriStomacoCasi = $this->TumoriStomacoCasi->patchEntity($tumoriStomacoCasi, $this->request->getData());
            if ($this->TumoriStomacoCasi->save($tumoriStomacoCasi)) {
                $this->Flash->success(__('The tumori stomaco casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori stomaco casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriStomacoCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Stomaco Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriStomacoCasi = $this->TumoriStomacoCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriStomacoCasi = $this->TumoriStomacoCasi->patchEntity($tumoriStomacoCasi, $this->request->getData());
            if ($this->TumoriStomacoCasi->save($tumoriStomacoCasi)) {
                $this->Flash->success(__('The tumori stomaco casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori stomaco casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriStomacoCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Stomaco Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriStomacoCasi = $this->TumoriStomacoCasi->get($id);
        if ($this->TumoriStomacoCasi->delete($tumoriStomacoCasi)) {
            $this->Flash->success(__('The tumori stomaco casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori stomaco casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
