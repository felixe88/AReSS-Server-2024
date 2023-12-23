<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * CronicitaBpcoCasi Controller
 *
 * @property \App\Model\Table\CronicitaBpcoCasiTable $CronicitaBpcoCasi
 * @method \App\Model\Entity\CronicitaBpcoCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CronicitaBpcoCasiController extends AppController
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


        $cronicitaBpcoCasi = $this->paginate($this->CronicitaBpcoCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('cronicitaBpcoCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Cronicita Bpco Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cronicitaBpcoCasi = $this->CronicitaBpcoCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cronicitaBpcoCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cronicitaBpcoCasi = $this->CronicitaBpcoCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $cronicitaBpcoCasi = $this->CronicitaBpcoCasi->patchEntity($cronicitaBpcoCasi, $this->request->getData());
            if ($this->CronicitaBpcoCasi->save($cronicitaBpcoCasi)) {
                $this->Flash->success(__('The cronicita bpco casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cronicita bpco casi could not be saved. Please, try again.'));
        }
        $this->set(compact('cronicitaBpcoCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cronicita Bpco Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cronicitaBpcoCasi = $this->CronicitaBpcoCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cronicitaBpcoCasi = $this->CronicitaBpcoCasi->patchEntity($cronicitaBpcoCasi, $this->request->getData());
            if ($this->CronicitaBpcoCasi->save($cronicitaBpcoCasi)) {
                $this->Flash->success(__('The cronicita bpco casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cronicita bpco casi could not be saved. Please, try again.'));
        }
        $this->set(compact('cronicitaBpcoCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cronicita Bpco Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cronicitaBpcoCasi = $this->CronicitaBpcoCasi->get($id);
        if ($this->CronicitaBpcoCasi->delete($cronicitaBpcoCasi)) {
            $this->Flash->success(__('The cronicita bpco casi has been deleted.'));
        } else {
            $this->Flash->error(__('The cronicita bpco casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
