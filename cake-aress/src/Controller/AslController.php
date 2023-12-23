<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;


/**
 * Asl Controller
 *
 * @property \App\Model\Table\AslTable $Asl
 * @method \App\Model\Entity\Asl[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AslController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $asl = $this->paginate($this->Asl);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('asl')));

    return $response;

    }

    /**
     * View method
     *
     * @param string|null $id Asl id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asl = $this->Asl->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('asl'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asl = $this->Asl->newEmptyEntity();
        if ($this->request->is('post')) {
            $asl = $this->Asl->patchEntity($asl, $this->request->getData());
            if ($this->Asl->save($asl)) {
                $this->Flash->success(__('The asl has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asl could not be saved. Please, try again.'));
        }
        $this->set(compact('asl'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Asl id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asl = $this->Asl->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asl = $this->Asl->patchEntity($asl, $this->request->getData());
            if ($this->Asl->save($asl)) {
                $this->Flash->success(__('The asl has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asl could not be saved. Please, try again.'));
        }
        $this->set(compact('asl'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Asl id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asl = $this->Asl->get($id);
        if ($this->Asl->delete($asl)) {
            $this->Flash->success(__('The asl has been deleted.'));
        } else {
            $this->Flash->error(__('The asl could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function query(){
        $results = $this->Asl->find('all', [
            'fields'=> [
                'Asl.IDAsl','Regioni.Descrizione'
            ],
            'contain' => ['Regioni']
        ]);
        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('results')));

    return $response;
    }
}
