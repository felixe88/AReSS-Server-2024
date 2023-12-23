<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriOvaioCasi Controller
 *
 * @property \App\Model\Table\TumoriOvaioCasiTable $TumoriOvaioCasi
 * @method \App\Model\Entity\TumoriOvaioCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriOvaioCasiController extends AppController
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

        $tumoriOvaioCasi = $this->paginate($this->TumoriOvaioCasi);

        $this->set(compact('tumoriOvaioCasi'));
        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriOvaioCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Ovaio Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriOvaioCasi = $this->TumoriOvaioCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriOvaioCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriOvaioCasi = $this->TumoriOvaioCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriOvaioCasi = $this->TumoriOvaioCasi->patchEntity($tumoriOvaioCasi, $this->request->getData());
            if ($this->TumoriOvaioCasi->save($tumoriOvaioCasi)) {
                $this->Flash->success(__('The tumori ovaio casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori ovaio casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriOvaioCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Ovaio Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriOvaioCasi = $this->TumoriOvaioCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriOvaioCasi = $this->TumoriOvaioCasi->patchEntity($tumoriOvaioCasi, $this->request->getData());
            if ($this->TumoriOvaioCasi->save($tumoriOvaioCasi)) {
                $this->Flash->success(__('The tumori ovaio casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori ovaio casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriOvaioCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Ovaio Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriOvaioCasi = $this->TumoriOvaioCasi->get($id);
        if ($this->TumoriOvaioCasi->delete($tumoriOvaioCasi)) {
            $this->Flash->success(__('The tumori ovaio casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori ovaio casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
