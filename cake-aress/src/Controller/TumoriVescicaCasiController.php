<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriVescicaCasi Controller
 *
 * @property \App\Model\Table\TumoriVescicaCasiTable $TumoriVescicaCasi
 * @method \App\Model\Entity\TumoriVescicaCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriVescicaCasiController extends AppController
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

        $tumoriVescicaCasi = $this->paginate($this->TumoriVescicaCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriVescicaCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Vescica Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriVescicaCasi = $this->TumoriVescicaCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriVescicaCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriVescicaCasi = $this->TumoriVescicaCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriVescicaCasi = $this->TumoriVescicaCasi->patchEntity($tumoriVescicaCasi, $this->request->getData());
            if ($this->TumoriVescicaCasi->save($tumoriVescicaCasi)) {
                $this->Flash->success(__('The tumori vescica casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori vescica casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriVescicaCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Vescica Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriVescicaCasi = $this->TumoriVescicaCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriVescicaCasi = $this->TumoriVescicaCasi->patchEntity($tumoriVescicaCasi, $this->request->getData());
            if ($this->TumoriVescicaCasi->save($tumoriVescicaCasi)) {
                $this->Flash->success(__('The tumori vescica casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori vescica casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriVescicaCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Vescica Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriVescicaCasi = $this->TumoriVescicaCasi->get($id);
        if ($this->TumoriVescicaCasi->delete($tumoriVescicaCasi)) {
            $this->Flash->success(__('The tumori vescica casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori vescica casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
