<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriMielomaCasi Controller
 *
 * @property \App\Model\Table\TumoriMielomaCasiTable $TumoriMielomaCasi
 * @method \App\Model\Entity\TumoriMielomaCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriMielomaCasiController extends AppController
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
        $tumoriMielomaCasi = $this->paginate($this->TumoriMielomaCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriMielomaCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Mieloma Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriMielomaCasi = $this->TumoriMielomaCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriMielomaCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriMielomaCasi = $this->TumoriMielomaCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriMielomaCasi = $this->TumoriMielomaCasi->patchEntity($tumoriMielomaCasi, $this->request->getData());
            if ($this->TumoriMielomaCasi->save($tumoriMielomaCasi)) {
                $this->Flash->success(__('The tumori mieloma casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori mieloma casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriMielomaCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Mieloma Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriMielomaCasi = $this->TumoriMielomaCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriMielomaCasi = $this->TumoriMielomaCasi->patchEntity($tumoriMielomaCasi, $this->request->getData());
            if ($this->TumoriMielomaCasi->save($tumoriMielomaCasi)) {
                $this->Flash->success(__('The tumori mieloma casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori mieloma casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriMielomaCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Mieloma Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriMielomaCasi = $this->TumoriMielomaCasi->get($id);
        if ($this->TumoriMielomaCasi->delete($tumoriMielomaCasi)) {
            $this->Flash->success(__('The tumori mieloma casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori mieloma casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
