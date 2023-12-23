<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriLinfomaHodgkinCasi Controller
 *
 * @property \App\Model\Table\TumoriLinfomaHodgkinCasiTable $TumoriLinfomaHodgkinCasi
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriLinfomaHodgkinCasiController extends AppController
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
        $tumoriLinfomaHodgkinCasi = $this->paginate($this->TumoriLinfomaHodgkinCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriLinfomaHodgkinCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Linfoma Hodgkin Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriLinfomaHodgkinCasi = $this->TumoriLinfomaHodgkinCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriLinfomaHodgkinCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriLinfomaHodgkinCasi = $this->TumoriLinfomaHodgkinCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriLinfomaHodgkinCasi = $this->TumoriLinfomaHodgkinCasi->patchEntity($tumoriLinfomaHodgkinCasi, $this->request->getData());
            if ($this->TumoriLinfomaHodgkinCasi->save($tumoriLinfomaHodgkinCasi)) {
                $this->Flash->success(__('The tumori linfoma hodgkin casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori linfoma hodgkin casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLinfomaHodgkinCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Linfoma Hodgkin Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriLinfomaHodgkinCasi = $this->TumoriLinfomaHodgkinCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriLinfomaHodgkinCasi = $this->TumoriLinfomaHodgkinCasi->patchEntity($tumoriLinfomaHodgkinCasi, $this->request->getData());
            if ($this->TumoriLinfomaHodgkinCasi->save($tumoriLinfomaHodgkinCasi)) {
                $this->Flash->success(__('The tumori linfoma hodgkin casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori linfoma hodgkin casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLinfomaHodgkinCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Linfoma Hodgkin Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriLinfomaHodgkinCasi = $this->TumoriLinfomaHodgkinCasi->get($id);
        if ($this->TumoriLinfomaHodgkinCasi->delete($tumoriLinfomaHodgkinCasi)) {
            $this->Flash->success(__('The tumori linfoma hodgkin casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori linfoma hodgkin casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
