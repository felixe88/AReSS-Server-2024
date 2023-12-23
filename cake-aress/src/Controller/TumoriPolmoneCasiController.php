<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriPolmoneCasi Controller
 *
 * @property \App\Model\Table\TumoriPolmoneCasiTable $TumoriPolmoneCasi
 * @method \App\Model\Entity\TumoriPolmoneCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriPolmoneCasiController extends AppController
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

        $tumoriPolmoneCasi = $this->paginate($this->TumoriPolmoneCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriPolmoneCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Polmone Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriPolmoneCasi = $this->TumoriPolmoneCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriPolmoneCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriPolmoneCasi = $this->TumoriPolmoneCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriPolmoneCasi = $this->TumoriPolmoneCasi->patchEntity($tumoriPolmoneCasi, $this->request->getData());
            if ($this->TumoriPolmoneCasi->save($tumoriPolmoneCasi)) {
                $this->Flash->success(__('The tumori polmone casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori polmone casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriPolmoneCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Polmone Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriPolmoneCasi = $this->TumoriPolmoneCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriPolmoneCasi = $this->TumoriPolmoneCasi->patchEntity($tumoriPolmoneCasi, $this->request->getData());
            if ($this->TumoriPolmoneCasi->save($tumoriPolmoneCasi)) {
                $this->Flash->success(__('The tumori polmone casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori polmone casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriPolmoneCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Polmone Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriPolmoneCasi = $this->TumoriPolmoneCasi->get($id);
        if ($this->TumoriPolmoneCasi->delete($tumoriPolmoneCasi)) {
            $this->Flash->success(__('The tumori polmone casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori polmone casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
