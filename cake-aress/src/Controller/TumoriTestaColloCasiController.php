<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriTestaColloCasi Controller
 *
 * @property \App\Model\Table\TumoriTestaColloCasiTable $TumoriTestaColloCasi
 * @method \App\Model\Entity\TumoriTestaColloCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriTestaColloCasiController extends AppController
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

        $tumoriTestaColloCasi = $this->paginate($this->TumoriTestaColloCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriTestaColloCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Testa Collo Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriTestaColloCasi = $this->TumoriTestaColloCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriTestaColloCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriTestaColloCasi = $this->TumoriTestaColloCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriTestaColloCasi = $this->TumoriTestaColloCasi->patchEntity($tumoriTestaColloCasi, $this->request->getData());
            if ($this->TumoriTestaColloCasi->save($tumoriTestaColloCasi)) {
                $this->Flash->success(__('The tumori testa collo casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori testa collo casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriTestaColloCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Testa Collo Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriTestaColloCasi = $this->TumoriTestaColloCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriTestaColloCasi = $this->TumoriTestaColloCasi->patchEntity($tumoriTestaColloCasi, $this->request->getData());
            if ($this->TumoriTestaColloCasi->save($tumoriTestaColloCasi)) {
                $this->Flash->success(__('The tumori testa collo casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori testa collo casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriTestaColloCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Testa Collo Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriTestaColloCasi = $this->TumoriTestaColloCasi->get($id);
        if ($this->TumoriTestaColloCasi->delete($tumoriTestaColloCasi)) {
            $this->Flash->success(__('The tumori testa collo casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori testa collo casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
