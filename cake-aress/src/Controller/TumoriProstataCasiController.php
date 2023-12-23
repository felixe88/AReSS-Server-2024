<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriProstataCasi Controller
 *
 * @property \App\Model\Table\TumoriProstataCasiTable $TumoriProstataCasi
 * @method \App\Model\Entity\TumoriProstataCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriProstataCasiController extends AppController
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

        $tumoriProstataCasi = $this->paginate($this->TumoriProstataCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriProstataCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Prostata Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriProstataCasi = $this->TumoriProstataCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriProstataCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriProstataCasi = $this->TumoriProstataCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriProstataCasi = $this->TumoriProstataCasi->patchEntity($tumoriProstataCasi, $this->request->getData());
            if ($this->TumoriProstataCasi->save($tumoriProstataCasi)) {
                $this->Flash->success(__('The tumori prostata casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori prostata casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriProstataCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Prostata Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriProstataCasi = $this->TumoriProstataCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriProstataCasi = $this->TumoriProstataCasi->patchEntity($tumoriProstataCasi, $this->request->getData());
            if ($this->TumoriProstataCasi->save($tumoriProstataCasi)) {
                $this->Flash->success(__('The tumori prostata casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori prostata casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriProstataCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Prostata Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriProstataCasi = $this->TumoriProstataCasi->get($id);
        if ($this->TumoriProstataCasi->delete($tumoriProstataCasi)) {
            $this->Flash->success(__('The tumori prostata casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori prostata casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
