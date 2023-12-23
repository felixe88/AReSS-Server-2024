<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriTesticoloCasi Controller
 *
 * @property \App\Model\Table\TumoriTesticoloCasiTable $TumoriTesticoloCasi
 * @method \App\Model\Entity\TumoriTesticoloCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriTesticoloCasiController extends AppController
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

        $tumoriTesticoloCasi = $this->paginate($this->TumoriTesticoloCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriTesticoloCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Testicolo Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriTesticoloCasi = $this->TumoriTesticoloCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriTesticoloCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriTesticoloCasi = $this->TumoriTesticoloCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriTesticoloCasi = $this->TumoriTesticoloCasi->patchEntity($tumoriTesticoloCasi, $this->request->getData());
            if ($this->TumoriTesticoloCasi->save($tumoriTesticoloCasi)) {
                $this->Flash->success(__('The tumori testicolo casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori testicolo casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriTesticoloCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Testicolo Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriTesticoloCasi = $this->TumoriTesticoloCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriTesticoloCasi = $this->TumoriTesticoloCasi->patchEntity($tumoriTesticoloCasi, $this->request->getData());
            if ($this->TumoriTesticoloCasi->save($tumoriTesticoloCasi)) {
                $this->Flash->success(__('The tumori testicolo casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori testicolo casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriTesticoloCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Testicolo Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriTesticoloCasi = $this->TumoriTesticoloCasi->get($id);
        if ($this->TumoriTesticoloCasi->delete($tumoriTesticoloCasi)) {
            $this->Flash->success(__('The tumori testicolo casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori testicolo casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
