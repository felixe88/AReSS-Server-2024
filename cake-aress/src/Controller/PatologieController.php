<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * Patologie Controller
 *
 * @property \App\Model\Table\PatologieTable $Patologie
 * @method \App\Model\Entity\Patologie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PatologieController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = ['limit' => 300,
        'maxLimit' => 400];
        $patologie = $this->paginate($this->Patologie);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('patologie')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Patologie id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patologie = $this->Patologie->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('patologie'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patologie = $this->Patologie->newEmptyEntity();
        if ($this->request->is('post')) {
            $patologie = $this->Patologie->patchEntity($patologie, $this->request->getData());
            if ($this->Patologie->save($patologie)) {
                $this->Flash->success(__('The patologie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patologie could not be saved. Please, try again.'));
        }
        $this->set(compact('patologie'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Patologie id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patologie = $this->Patologie->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patologie = $this->Patologie->patchEntity($patologie, $this->request->getData());
            if ($this->Patologie->save($patologie)) {
                $this->Flash->success(__('The patologie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patologie could not be saved. Please, try again.'));
        }
        $this->set(compact('patologie'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Patologie id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patologie = $this->Patologie->get($id);
        if ($this->Patologie->delete($patologie)) {
            $this->Flash->success(__('The patologie has been deleted.'));
        } else {
            $this->Flash->error(__('The patologie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
