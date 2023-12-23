<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriPancreasCasi Controller
 *
 * @property \App\Model\Table\TumoriPancreasCasiTable $TumoriPancreasCasi
 * @method \App\Model\Entity\TumoriPancreasCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriPancreasCasiController extends AppController
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

        $tumoriPancreasCasi = $this->paginate($this->TumoriPancreasCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriPancreasCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Pancreas Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriPancreasCasi = $this->TumoriPancreasCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriPancreasCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriPancreasCasi = $this->TumoriPancreasCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriPancreasCasi = $this->TumoriPancreasCasi->patchEntity($tumoriPancreasCasi, $this->request->getData());
            if ($this->TumoriPancreasCasi->save($tumoriPancreasCasi)) {
                $this->Flash->success(__('The tumori pancreas casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori pancreas casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriPancreasCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Pancreas Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriPancreasCasi = $this->TumoriPancreasCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriPancreasCasi = $this->TumoriPancreasCasi->patchEntity($tumoriPancreasCasi, $this->request->getData());
            if ($this->TumoriPancreasCasi->save($tumoriPancreasCasi)) {
                $this->Flash->success(__('The tumori pancreas casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori pancreas casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriPancreasCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Pancreas Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriPancreasCasi = $this->TumoriPancreasCasi->get($id);
        if ($this->TumoriPancreasCasi->delete($tumoriPancreasCasi)) {
            $this->Flash->success(__('The tumori pancreas casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori pancreas casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
