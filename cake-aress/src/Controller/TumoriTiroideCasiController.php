<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriTiroideCasi Controller
 *
 * @property \App\Model\Table\TumoriTiroideCasiTable $TumoriTiroideCasi
 * @method \App\Model\Entity\TumoriTiroideCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriTiroideCasiController extends AppController
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

        $tumoriTiroideCasi = $this->paginate($this->TumoriTiroideCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriTiroideCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Tiroide Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriTiroideCasi = $this->TumoriTiroideCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriTiroideCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriTiroideCasi = $this->TumoriTiroideCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriTiroideCasi = $this->TumoriTiroideCasi->patchEntity($tumoriTiroideCasi, $this->request->getData());
            if ($this->TumoriTiroideCasi->save($tumoriTiroideCasi)) {
                $this->Flash->success(__('The tumori tiroide casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori tiroide casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriTiroideCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Tiroide Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriTiroideCasi = $this->TumoriTiroideCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriTiroideCasi = $this->TumoriTiroideCasi->patchEntity($tumoriTiroideCasi, $this->request->getData());
            if ($this->TumoriTiroideCasi->save($tumoriTiroideCasi)) {
                $this->Flash->success(__('The tumori tiroide casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori tiroide casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriTiroideCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Tiroide Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriTiroideCasi = $this->TumoriTiroideCasi->get($id);
        if ($this->TumoriTiroideCasi->delete($tumoriTiroideCasi)) {
            $this->Flash->success(__('The tumori tiroide casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori tiroide casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
