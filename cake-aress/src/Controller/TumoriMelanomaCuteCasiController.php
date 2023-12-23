<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriMelanomaCuteCasi Controller
 *
 * @property \App\Model\Table\TumoriMelanomaCuteCasiTable $TumoriMelanomaCuteCasi
 * @method \App\Model\Entity\TumoriMelanomaCuteCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriMelanomaCuteCasiController extends AppController
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

        $tumoriMelanomaCuteCasi = $this->paginate($this->TumoriMelanomaCuteCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriMelanomaCuteCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Melanoma Cute Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriMelanomaCuteCasi = $this->TumoriMelanomaCuteCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriMelanomaCuteCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriMelanomaCuteCasi = $this->TumoriMelanomaCuteCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriMelanomaCuteCasi = $this->TumoriMelanomaCuteCasi->patchEntity($tumoriMelanomaCuteCasi, $this->request->getData());
            if ($this->TumoriMelanomaCuteCasi->save($tumoriMelanomaCuteCasi)) {
                $this->Flash->success(__('The tumori melanoma cute casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori melanoma cute casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriMelanomaCuteCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Melanoma Cute Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriMelanomaCuteCasi = $this->TumoriMelanomaCuteCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriMelanomaCuteCasi = $this->TumoriMelanomaCuteCasi->patchEntity($tumoriMelanomaCuteCasi, $this->request->getData());
            if ($this->TumoriMelanomaCuteCasi->save($tumoriMelanomaCuteCasi)) {
                $this->Flash->success(__('The tumori melanoma cute casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori melanoma cute casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriMelanomaCuteCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Melanoma Cute Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriMelanomaCuteCasi = $this->TumoriMelanomaCuteCasi->get($id);
        if ($this->TumoriMelanomaCuteCasi->delete($tumoriMelanomaCuteCasi)) {
            $this->Flash->success(__('The tumori melanoma cute casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori melanoma cute casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
