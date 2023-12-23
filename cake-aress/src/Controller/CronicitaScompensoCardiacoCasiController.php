<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * CronicitaScompensoCardiacoCasi Controller
 *
 * @property \App\Model\Table\CronicitaScompensoCardiacoCasiTable $CronicitaScompensoCardiacoCasi
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CronicitaScompensoCardiacoCasiController extends AppController
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
        $cronicitaScompensoCardiacoCasi = $this->paginate($this->CronicitaScompensoCardiacoCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('cronicitaScompensoCardiacoCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Cronicita Scompenso Cardiaco Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cronicitaScompensoCardiacoCasi = $this->CronicitaScompensoCardiacoCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cronicitaScompensoCardiacoCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cronicitaScompensoCardiacoCasi = $this->CronicitaScompensoCardiacoCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $cronicitaScompensoCardiacoCasi = $this->CronicitaScompensoCardiacoCasi->patchEntity($cronicitaScompensoCardiacoCasi, $this->request->getData());
            if ($this->CronicitaScompensoCardiacoCasi->save($cronicitaScompensoCardiacoCasi)) {
                $this->Flash->success(__('The cronicita scompenso cardiaco casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cronicita scompenso cardiaco casi could not be saved. Please, try again.'));
        }
        $this->set(compact('cronicitaScompensoCardiacoCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cronicita Scompenso Cardiaco Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cronicitaScompensoCardiacoCasi = $this->CronicitaScompensoCardiacoCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cronicitaScompensoCardiacoCasi = $this->CronicitaScompensoCardiacoCasi->patchEntity($cronicitaScompensoCardiacoCasi, $this->request->getData());
            if ($this->CronicitaScompensoCardiacoCasi->save($cronicitaScompensoCardiacoCasi)) {
                $this->Flash->success(__('The cronicita scompenso cardiaco casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cronicita scompenso cardiaco casi could not be saved. Please, try again.'));
        }
        $this->set(compact('cronicitaScompensoCardiacoCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cronicita Scompenso Cardiaco Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cronicitaScompensoCardiacoCasi = $this->CronicitaScompensoCardiacoCasi->get($id);
        if ($this->CronicitaScompensoCardiacoCasi->delete($cronicitaScompensoCardiacoCasi)) {
            $this->Flash->success(__('The cronicita scompenso cardiaco casi has been deleted.'));
        } else {
            $this->Flash->error(__('The cronicita scompenso cardiaco casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
