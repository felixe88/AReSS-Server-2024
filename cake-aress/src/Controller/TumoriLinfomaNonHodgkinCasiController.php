<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriLinfomaNonHodgkinCasi Controller
 *
 * @property \App\Model\Table\TumoriLinfomaNonHodgkinCasiTable $TumoriLinfomaNonHodgkinCasi
 * @method \App\Model\Entity\TumoriLinfomaNonHodgkinCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriLinfomaNonHodgkinCasiController extends AppController
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
        $tumoriLinfomaNonHodgkinCasi = $this->paginate($this->TumoriLinfomaNonHodgkinCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriLinfomaNonHodgkinCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Linfoma Non Hodgkin Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriLinfomaNonHodgkinCasi = $this->TumoriLinfomaNonHodgkinCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriLinfomaNonHodgkinCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriLinfomaNonHodgkinCasi = $this->TumoriLinfomaNonHodgkinCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriLinfomaNonHodgkinCasi = $this->TumoriLinfomaNonHodgkinCasi->patchEntity($tumoriLinfomaNonHodgkinCasi, $this->request->getData());
            if ($this->TumoriLinfomaNonHodgkinCasi->save($tumoriLinfomaNonHodgkinCasi)) {
                $this->Flash->success(__('The tumori linfoma non hodgkin casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori linfoma non hodgkin casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLinfomaNonHodgkinCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Linfoma Non Hodgkin Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriLinfomaNonHodgkinCasi = $this->TumoriLinfomaNonHodgkinCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriLinfomaNonHodgkinCasi = $this->TumoriLinfomaNonHodgkinCasi->patchEntity($tumoriLinfomaNonHodgkinCasi, $this->request->getData());
            if ($this->TumoriLinfomaNonHodgkinCasi->save($tumoriLinfomaNonHodgkinCasi)) {
                $this->Flash->success(__('The tumori linfoma non hodgkin casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori linfoma non hodgkin casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLinfomaNonHodgkinCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Linfoma Non Hodgkin Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriLinfomaNonHodgkinCasi = $this->TumoriLinfomaNonHodgkinCasi->get($id);
        if ($this->TumoriLinfomaNonHodgkinCasi->delete($tumoriLinfomaNonHodgkinCasi)) {
            $this->Flash->success(__('The tumori linfoma non hodgkin casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori linfoma non hodgkin casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
