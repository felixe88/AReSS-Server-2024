<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * Regioni Controller
 *
 * @property \App\Model\Table\RegioniTable $Regioni
 * @method \App\Model\Entity\Regioni[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegioniController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $regioni = $this->paginate($this->Regioni);

        $response = new Response();
        $response = $response->withType('application/json')
                             ->withStringBody(json_encode(compact('regioni')));

    return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Regioni id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $regioni = $this->Regioni->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('regioni'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $regioni = $this->Regioni->newEmptyEntity();
        if ($this->request->is('post')) {
            $regioni = $this->Regioni->patchEntity($regioni, $this->request->getData());
            if ($this->Regioni->save($regioni)) {
                $this->Flash->success(__('The regioni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regioni could not be saved. Please, try again.'));
        }
        $this->set(compact('regioni'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Regioni id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $regioni = $this->Regioni->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $regioni = $this->Regioni->patchEntity($regioni, $this->request->getData());
            if ($this->Regioni->save($regioni)) {
                $this->Flash->success(__('The regioni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regioni could not be saved. Please, try again.'));
        }
        $this->set(compact('regioni'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Regioni id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $regioni = $this->Regioni->get($id);
        if ($this->Regioni->delete($regioni)) {
            $this->Flash->success(__('The regioni has been deleted.'));
        } else {
            $this->Flash->error(__('The regioni could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    // public function query() {
    //     $results = $this->Regioni->find('all', [
    //         'fields' => [
    //             'Asl.Descrizione'
    //         ],
    //         'contain' => ['Asl', 'Distretti', 'Comuni'], // Specifica la tabella associata
    //     ]);
    
    //     $response = new Response();
    //     $response = $response->withType('application/json')
    //                         ->withStringBody(json_encode(compact('results')));
    
    //     return $response;
    // }
    public function query() {
        $results = $this->Regioni->find('all', [
            'contain' => [
                'Asl' => [
                    'fields' => 'IDRegione',
                    'Distretti' => [
                        'fields' => ['Descrizione'],
                        'Comuni' => [
                            'fields' => ['Descrizione']
                        ]
                    ]
                ]
            ]
        ]);
    
        $response = new Response();
        $response = $response->withType('application/json')
                            ->withStringBody(json_encode(compact('results')));
    
        return $response;
    }
}
