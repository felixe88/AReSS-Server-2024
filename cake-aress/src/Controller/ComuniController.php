<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;
use App\Service\ComuniService;

class ComuniController extends AppController
{
    public function index()
    {
        $this->paginate = ['limit' => 300,
            'maxLimit' => 400];
        $comuni = $this->paginate($this->Comuni);

        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode(compact('comuni')));

        return $response;
    }
    public function view($id = null)
    {
        $comuni = $this->Comuni->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('comuni'));
    }
    public function add()
    {
        $comuni = $this->Comuni->newEmptyEntity();
        if ($this->request->is('post')) {
            $comuni = $this->Comuni->patchEntity($comuni, $this->request->getData());
            if ($this->Comuni->save($comuni)) {
                $this->Flash->success(__('The comuni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comuni could not be saved. Please, try again.'));
        }
        $this->set(compact('comuni'));
    }

    public function edit($id = null)
    {
        $comuni = $this->Comuni->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comuni = $this->Comuni->patchEntity($comuni, $this->request->getData());
            if ($this->Comuni->save($comuni)) {
                $this->Flash->success(__('The comuni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comuni could not be saved. Please, try again.'));
        }
        $this->set(compact('comuni'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comuni = $this->Comuni->get($id);
        if ($this->Comuni->delete($comuni)) {
            $this->Flash->success(__('The comuni has been deleted.'));
        } else {
            $this->Flash->error(__('The comuni could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    // public function query()
    // {
    //     $results = $this->Comuni->find()
    //         ->select([
    //             'Comuni.Descrizione',
    //             'Distretti.Descrizione',
    //             'Asl.Descrizione',
    //             'Asl.IDAsl',
    //             'ComunePopolazioneTumoriTest.sesso',
    //             'ComunePopolazioneTumoriTest.popolazione'
    //         ])
    //         ->contain(['Distretti.Asl',
    //             'ComunePopolazioneTumoriTest'
    //         ])
    //         ->toArray();

    //     $response = new Response();
    //     $response = $response->withType('application/json')
    //         ->withStringBody(json_encode(compact('results')));

    //     return $response;
    // }

    
    public function query()
    {
        $comuniService = new ComuniService($this->Comuni);

        $allComuniData = $comuniService->getAllComuniData();

        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode(compact('allComuniData')));

        return $response;
    }
}
