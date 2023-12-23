<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriColonRettoCasi Controller
 *
 * @property \App\Model\Table\TumoriColonRettoCasiTable $TumoriColonRettoCasi
 * @method \App\Model\Entity\TumoriColonRettoCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriColonRettoCasiController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //$this->log($this->TumoriColonRettoCasi->find()->enableHydration(false)->toArray(), 'debug');
        
        $limit = $this->request->getQuery('limit', 100000); // Dimensione predefinita della pagina
        $page = $this->request->getQuery('page', 1); // Numero di pagina predefinito
    
        $this->paginate = ['limit' => $limit,
                            'maxLimit' => 150000,
                            'page' => $page];

        $tumoriColonRettoCasi = $this->paginate($this->TumoriColonRettoCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriColonRettoCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Colon Retto Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriColonRettoCasi = $this->TumoriColonRettoCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriColonRettoCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriColonRettoCasi = $this->TumoriColonRettoCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriColonRettoCasi = $this->TumoriColonRettoCasi->patchEntity($tumoriColonRettoCasi, $this->request->getData());
            if ($this->TumoriColonRettoCasi->save($tumoriColonRettoCasi)) {
                $this->Flash->success(__('The tumori colon retto casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori colon retto casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriColonRettoCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Colon Retto Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriColonRettoCasi = $this->TumoriColonRettoCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriColonRettoCasi = $this->TumoriColonRettoCasi->patchEntity($tumoriColonRettoCasi, $this->request->getData());
            if ($this->TumoriColonRettoCasi->save($tumoriColonRettoCasi)) {
                $this->Flash->success(__('The tumori colon retto casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori colon retto casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriColonRettoCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Colon Retto Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriColonRettoCasi = $this->TumoriColonRettoCasi->get($id);
        if ($this->TumoriColonRettoCasi->delete($tumoriColonRettoCasi)) {
            $this->Flash->success(__('The tumori colon retto casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori colon retto casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
