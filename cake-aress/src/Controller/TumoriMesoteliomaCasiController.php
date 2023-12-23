<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriMesoteliomaCasi Controller
 *
 * @property \App\Model\Table\TumoriMesoteliomaCasiTable $TumoriMesoteliomaCasi
 * @method \App\Model\Entity\TumoriMesoteliomaCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriMesoteliomaCasiController extends AppController
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

        $tumoriMesoteliomaCasi = $this->paginate($this->TumoriMesoteliomaCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriMesoteliomaCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Mesotelioma Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriMesoteliomaCasi = $this->TumoriMesoteliomaCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriMesoteliomaCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriMesoteliomaCasi = $this->TumoriMesoteliomaCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriMesoteliomaCasi = $this->TumoriMesoteliomaCasi->patchEntity($tumoriMesoteliomaCasi, $this->request->getData());
            if ($this->TumoriMesoteliomaCasi->save($tumoriMesoteliomaCasi)) {
                $this->Flash->success(__('The tumori mesotelioma casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori mesotelioma casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriMesoteliomaCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Mesotelioma Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriMesoteliomaCasi = $this->TumoriMesoteliomaCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriMesoteliomaCasi = $this->TumoriMesoteliomaCasi->patchEntity($tumoriMesoteliomaCasi, $this->request->getData());
            if ($this->TumoriMesoteliomaCasi->save($tumoriMesoteliomaCasi)) {
                $this->Flash->success(__('The tumori mesotelioma casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori mesotelioma casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriMesoteliomaCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Mesotelioma Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriMesoteliomaCasi = $this->TumoriMesoteliomaCasi->get($id);
        if ($this->TumoriMesoteliomaCasi->delete($tumoriMesoteliomaCasi)) {
            $this->Flash->success(__('The tumori mesotelioma casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori mesotelioma casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
