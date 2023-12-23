<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * CronicitaIpertensioneCasi Controller
 *
 * @property \App\Model\Table\CronicitaIpertensioneCasiTable $CronicitaIpertensioneCasi
 * @method \App\Model\Entity\CronicitaIpertensioneCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CronicitaIpertensioneCasiController extends AppController
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

        $cronicitaIpertensioneCasi = $this->paginate($this->CronicitaIpertensioneCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('cronicitaIpertensioneCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Cronicita Ipertensione Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cronicitaIpertensioneCasi = $this->CronicitaIpertensioneCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cronicitaIpertensioneCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cronicitaIpertensioneCasi = $this->CronicitaIpertensioneCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $cronicitaIpertensioneCasi = $this->CronicitaIpertensioneCasi->patchEntity($cronicitaIpertensioneCasi, $this->request->getData());
            if ($this->CronicitaIpertensioneCasi->save($cronicitaIpertensioneCasi)) {
                $this->Flash->success(__('The cronicita ipertensione casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cronicita ipertensione casi could not be saved. Please, try again.'));
        }
        $this->set(compact('cronicitaIpertensioneCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cronicita Ipertensione Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cronicitaIpertensioneCasi = $this->CronicitaIpertensioneCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cronicitaIpertensioneCasi = $this->CronicitaIpertensioneCasi->patchEntity($cronicitaIpertensioneCasi, $this->request->getData());
            if ($this->CronicitaIpertensioneCasi->save($cronicitaIpertensioneCasi)) {
                $this->Flash->success(__('The cronicita ipertensione casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cronicita ipertensione casi could not be saved. Please, try again.'));
        }
        $this->set(compact('cronicitaIpertensioneCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cronicita Ipertensione Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cronicitaIpertensioneCasi = $this->CronicitaIpertensioneCasi->get($id);
        if ($this->CronicitaIpertensioneCasi->delete($cronicitaIpertensioneCasi)) {
            $this->Flash->success(__('The cronicita ipertensione casi has been deleted.'));
        } else {
            $this->Flash->error(__('The cronicita ipertensione casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
