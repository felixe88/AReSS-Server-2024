<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriUteroColloCasi Controller
 *
 * @property \App\Model\Table\TumoriUteroColloCasiTable $TumoriUteroColloCasi
 * @method \App\Model\Entity\TumoriUteroColloCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriUteroColloCasiController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = ['limit' => 80000,
        'maxLimit' => 100000];

        $tumoriUteroColloCasi = $this->paginate($this->TumoriUteroColloCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriUteroColloCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Utero Collo Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriUteroColloCasi = $this->TumoriUteroColloCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriUteroColloCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriUteroColloCasi = $this->TumoriUteroColloCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriUteroColloCasi = $this->TumoriUteroColloCasi->patchEntity($tumoriUteroColloCasi, $this->request->getData());
            if ($this->TumoriUteroColloCasi->save($tumoriUteroColloCasi)) {
                $this->Flash->success(__('The tumori utero collo casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori utero collo casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriUteroColloCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Utero Collo Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriUteroColloCasi = $this->TumoriUteroColloCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriUteroColloCasi = $this->TumoriUteroColloCasi->patchEntity($tumoriUteroColloCasi, $this->request->getData());
            if ($this->TumoriUteroColloCasi->save($tumoriUteroColloCasi)) {
                $this->Flash->success(__('The tumori utero collo casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori utero collo casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriUteroColloCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Utero Collo Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriUteroColloCasi = $this->TumoriUteroColloCasi->get($id);
        if ($this->TumoriUteroColloCasi->delete($tumoriUteroColloCasi)) {
            $this->Flash->success(__('The tumori utero collo casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori utero collo casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
