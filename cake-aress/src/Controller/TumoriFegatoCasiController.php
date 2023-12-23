<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriFegatoCasi Controller
 *
 * @property \App\Model\Table\TumoriFegatoCasiTable $TumoriFegatoCasi
 * @method \App\Model\Entity\TumoriFegatoCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriFegatoCasiController extends AppController
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
        $tumoriFegatoCasi = $this->paginate($this->TumoriFegatoCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriFegatoCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Fegato Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriFegatoCasi = $this->TumoriFegatoCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriFegatoCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriFegatoCasi = $this->TumoriFegatoCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriFegatoCasi = $this->TumoriFegatoCasi->patchEntity($tumoriFegatoCasi, $this->request->getData());
            if ($this->TumoriFegatoCasi->save($tumoriFegatoCasi)) {
                $this->Flash->success(__('The tumori fegato casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori fegato casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriFegatoCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Fegato Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriFegatoCasi = $this->TumoriFegatoCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriFegatoCasi = $this->TumoriFegatoCasi->patchEntity($tumoriFegatoCasi, $this->request->getData());
            if ($this->TumoriFegatoCasi->save($tumoriFegatoCasi)) {
                $this->Flash->success(__('The tumori fegato casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori fegato casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriFegatoCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Fegato Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriFegatoCasi = $this->TumoriFegatoCasi->get($id);
        if ($this->TumoriFegatoCasi->delete($tumoriFegatoCasi)) {
            $this->Flash->success(__('The tumori fegato casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori fegato casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
