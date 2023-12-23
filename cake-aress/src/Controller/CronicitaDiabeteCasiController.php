<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * CronicitaDiabeteCasi Controller
 *
 * @property \App\Model\Table\CronicitaDiabeteCasiTable $CronicitaDiabeteCasi
 * @method \App\Model\Entity\CronicitaDiabeteCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CronicitaDiabeteCasiController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = ['limit' => 80000,
        'maxLimit' => 100000];

        $cronicitaDiabeteCasi = $this->paginate($this->CronicitaDiabeteCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('cronicitaDiabeteCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Cronicita Diabete Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cronicitaDiabeteCasi = $this->CronicitaDiabeteCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cronicitaDiabeteCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cronicitaDiabeteCasi = $this->CronicitaDiabeteCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $cronicitaDiabeteCasi = $this->CronicitaDiabeteCasi->patchEntity($cronicitaDiabeteCasi, $this->request->getData());
            if ($this->CronicitaDiabeteCasi->save($cronicitaDiabeteCasi)) {
                $this->Flash->success(__('The cronicita diabete casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cronicita diabete casi could not be saved. Please, try again.'));
        }
        $this->set(compact('cronicitaDiabeteCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cronicita Diabete Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cronicitaDiabeteCasi = $this->CronicitaDiabeteCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cronicitaDiabeteCasi = $this->CronicitaDiabeteCasi->patchEntity($cronicitaDiabeteCasi, $this->request->getData());
            if ($this->CronicitaDiabeteCasi->save($cronicitaDiabeteCasi)) {
                $this->Flash->success(__('The cronicita diabete casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cronicita diabete casi could not be saved. Please, try again.'));
        }
        $this->set(compact('cronicitaDiabeteCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cronicita Diabete Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cronicitaDiabeteCasi = $this->CronicitaDiabeteCasi->get($id);
        if ($this->CronicitaDiabeteCasi->delete($cronicitaDiabeteCasi)) {
            $this->Flash->success(__('The cronicita diabete casi has been deleted.'));
        } else {
            $this->Flash->error(__('The cronicita diabete casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
