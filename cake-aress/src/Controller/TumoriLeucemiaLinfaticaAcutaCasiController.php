<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * TumoriLeucemiaLinfaticaAcutaCasi Controller
 *
 * @property \App\Model\Table\TumoriLeucemiaLinfaticaAcutaCasiTable $TumoriLeucemiaLinfaticaAcutaCasi
 * @method \App\Model\Entity\TumoriLeucemiaLinfaticaAcutaCasi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TumoriLeucemiaLinfaticaAcutaCasiController extends AppController
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

        $tumoriLeucemiaLinfaticaAcutaCasi = $this->paginate($this->TumoriLeucemiaLinfaticaAcutaCasi);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('tumoriLeucemiaLinfaticaAcutaCasi')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Tumori Leucemia Linfatica Acuta Casi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tumoriLeucemiaLinfaticaAcutaCasi = $this->TumoriLeucemiaLinfaticaAcutaCasi->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tumoriLeucemiaLinfaticaAcutaCasi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tumoriLeucemiaLinfaticaAcutaCasi = $this->TumoriLeucemiaLinfaticaAcutaCasi->newEmptyEntity();
        if ($this->request->is('post')) {
            $tumoriLeucemiaLinfaticaAcutaCasi = $this->TumoriLeucemiaLinfaticaAcutaCasi->patchEntity($tumoriLeucemiaLinfaticaAcutaCasi, $this->request->getData());
            if ($this->TumoriLeucemiaLinfaticaAcutaCasi->save($tumoriLeucemiaLinfaticaAcutaCasi)) {
                $this->Flash->success(__('The tumori leucemia linfatica acuta casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori leucemia linfatica acuta casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLeucemiaLinfaticaAcutaCasi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tumori Leucemia Linfatica Acuta Casi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tumoriLeucemiaLinfaticaAcutaCasi = $this->TumoriLeucemiaLinfaticaAcutaCasi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tumoriLeucemiaLinfaticaAcutaCasi = $this->TumoriLeucemiaLinfaticaAcutaCasi->patchEntity($tumoriLeucemiaLinfaticaAcutaCasi, $this->request->getData());
            if ($this->TumoriLeucemiaLinfaticaAcutaCasi->save($tumoriLeucemiaLinfaticaAcutaCasi)) {
                $this->Flash->success(__('The tumori leucemia linfatica acuta casi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tumori leucemia linfatica acuta casi could not be saved. Please, try again.'));
        }
        $this->set(compact('tumoriLeucemiaLinfaticaAcutaCasi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tumori Leucemia Linfatica Acuta Casi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tumoriLeucemiaLinfaticaAcutaCasi = $this->TumoriLeucemiaLinfaticaAcutaCasi->get($id);
        if ($this->TumoriLeucemiaLinfaticaAcutaCasi->delete($tumoriLeucemiaLinfaticaAcutaCasi)) {
            $this->Flash->success(__('The tumori leucemia linfatica acuta casi has been deleted.'));
        } else {
            $this->Flash->error(__('The tumori leucemia linfatica acuta casi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
