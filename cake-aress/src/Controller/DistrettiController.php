<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * Distretti Controller
 *
 * @property \App\Model\Table\DistrettiTable $Distretti
 * @method \App\Model\Entity\Distretti[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DistrettiController extends AppController
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
        $distretti = $this->paginate($this->Distretti);

        $this->set(compact('distretti'));
        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('distretti')));

    return $response;

    }

    /**
     * View method
     *
     * @param string|null $id Distretti id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $distretti = $this->Distretti->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('distretti'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $distretti = $this->Distretti->newEmptyEntity();
        if ($this->request->is('post')) {
            $distretti = $this->Distretti->patchEntity($distretti, $this->request->getData());
            if ($this->Distretti->save($distretti)) {
                $this->Flash->success(__('The distretti has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The distretti could not be saved. Please, try again.'));
        }
        $this->set(compact('distretti'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Distretti id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $distretti = $this->Distretti->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $distretti = $this->Distretti->patchEntity($distretti, $this->request->getData());
            if ($this->Distretti->save($distretti)) {
                $this->Flash->success(__('The distretti has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The distretti could not be saved. Please, try again.'));
        }
        $this->set(compact('distretti'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Distretti id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $distretti = $this->Distretti->get($id);
        if ($this->Distretti->delete($distretti)) {
            $this->Flash->success(__('The distretti has been deleted.'));
        } else {
            $this->Flash->error(__('The distretti could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
