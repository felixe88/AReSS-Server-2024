<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriLeucemiaLinfaticaCronicaCasi Controller
 *
 * @property \App\Model\Table\TumoriLeucemiaLinfaticaCronicaCasiTable $TumoriLeucemiaLinfaticaCronicaCasi
 * @method \App\Model\Entity\TumoriLeucemiaLinfaticaCronicaCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriLeucemiaLinfaticaCronicaCasiController extends AppController
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
        $tumoriLeucemiaLinfaticaCronicaCasi = $this->paginate($this->TumoriLeucemiaLinfaticaCronicaCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriLeucemiaLinfaticaCronicaCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Leucemia Linfatica Cronica Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriLeucemiaLinfaticaCronicaCasi = $this->TumoriLeucemiaLinfaticaCronicaCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriLeucemiaLinfaticaCronicaCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriLeucemiaLinfaticaCronicaCasi = $this->TumoriLeucemiaLinfaticaCronicaCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriLeucemiaLinfaticaCronicaCasi = $this->TumoriLeucemiaLinfaticaCronicaCasi->patchEntity($tumoriLeucemiaLinfaticaCronicaCasi, $this->request->getData());
            if ($this->TumoriLeucemiaLinfaticaCronicaCasi->save($tumoriLeucemiaLinfaticaCronicaCasi)) {
                $this->Flash->success(__('The tumori leucemia linfatica cronica casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori leucemia linfatica cronica casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLeucemiaLinfaticaCronicaCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Leucemia Linfatica Cronica Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriLeucemiaLinfaticaCronicaCasi = $this->TumoriLeucemiaLinfaticaCronicaCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriLeucemiaLinfaticaCronicaCasi = $this->TumoriLeucemiaLinfaticaCronicaCasi->patchEntity($tumoriLeucemiaLinfaticaCronicaCasi, $this->request->getData());
            if ($this->TumoriLeucemiaLinfaticaCronicaCasi->save($tumoriLeucemiaLinfaticaCronicaCasi)) {
                $this->Flash->success(__('The tumori leucemia linfatica cronica casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori leucemia linfatica cronica casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLeucemiaLinfaticaCronicaCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Leucemia Linfatica Cronica Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriLeucemiaLinfaticaCronicaCasi = $this->TumoriLeucemiaLinfaticaCronicaCasi->get($id);
        if ($this->TumoriLeucemiaLinfaticaCronicaCasi->delete($tumoriLeucemiaLinfaticaCronicaCasi)) {
            $this->Flash->success(__('The tumori leucemia linfatica cronica casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori leucemia linfatica cronica casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
