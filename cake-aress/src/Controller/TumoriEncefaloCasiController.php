<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriEncefaloCasi Controller
 *
 * @property \App\Model\Table\TumoriEncefaloCasiTable $TumoriEncefaloCasi
 * @method \App\Model\Entity\TumoriEncefaloCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriEncefaloCasiController extends AppController
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
        $tumoriEncefaloCasi = $this->paginate($this->TumoriEncefaloCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriEncefaloCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Encefalo Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriEncefaloCasi = $this->TumoriEncefaloCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriEncefaloCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriEncefaloCasi = $this->TumoriEncefaloCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriEncefaloCasi = $this->TumoriEncefaloCasi->patchEntity($tumoriEncefaloCasi, $this->request->getData());
            if ($this->TumoriEncefaloCasi->save($tumoriEncefaloCasi)) {
                $this->Flash->success(__('The tumori encefalo casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori encefalo casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriEncefaloCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Encefalo Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriEncefaloCasi = $this->TumoriEncefaloCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriEncefaloCasi = $this->TumoriEncefaloCasi->patchEntity($tumoriEncefaloCasi, $this->request->getData());
            if ($this->TumoriEncefaloCasi->save($tumoriEncefaloCasi)) {
                $this->Flash->success(__('The tumori encefalo casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori encefalo casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriEncefaloCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Encefalo Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriEncefaloCasi = $this->TumoriEncefaloCasi->get($id);
        if ($this->TumoriEncefaloCasi->delete($tumoriEncefaloCasi)) {
            $this->Flash->success(__('The tumori encefalo casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori encefalo casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
