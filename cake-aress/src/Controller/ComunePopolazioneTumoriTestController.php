<?php
declare(strict_types=1);


namespace App\Controller;

use App\Model\Table\ComunePopolazioneTumoriTestTable;
use Cake\Http\Response;
// use Cors\Controller\Component\CorsComponent;

/**
 * ComunePopolazioneTumoriTest Controller
 *
 * @property \App\Model\Table\ComunePopolazioneTumoriTestTable $ComunePopolazioneTumoriTest
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComunePopolazioneTumoriTestController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        // $this->loadComponent('Cors.Cors');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $this->log($this->ComunePopolazioneTumoriTest->find()->enableHydration(false)->toArray(), 'debug');
        $limit = $this->request->getQuery('limit', 100000); // Dimensione predefinita della pagina
        $page = $this->request->getQuery('page', 1); // Numero di pagina predefinito

        $this->paginate = ['limit' => $limit,
            'maxLimit' => 150000,
            'page' => $page];

        $comunePopolazioneTumoriTest = $this->paginate($this->ComunePopolazioneTumoriTest);

        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode(compact('comunePopolazioneTumoriTest')));

        return $response;

    }

    /**
     * View method
     *
     * @param string|null $id Comune Popolazione Tumori Test id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comunePopolazioneTumoriTest = $this->ComunePopolazioneTumoriTest->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('comunePopolazioneTumoriTest'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comunePopolazioneTumoriTest = $this->ComunePopolazioneTumoriTest->newEmptyEntity();
        if ($this->request->is('post')) {
            $comunePopolazioneTumoriTest = $this->ComunePopolazioneTumoriTest->patchEntity($comunePopolazioneTumoriTest, $this->request->getData());
            if ($this->ComunePopolazioneTumoriTest->save($comunePopolazioneTumoriTest)) {
                $this->Flash->success(__('The comune popolazione tumori test has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comune popolazione tumori test could not be saved. Please, try again.'));
        }
        $this->set(compact('comunePopolazioneTumoriTest'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comune Popolazione Tumori Test id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comunePopolazioneTumoriTest = $this->ComunePopolazioneTumoriTest->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comunePopolazioneTumoriTest = $this->ComunePopolazioneTumoriTest->patchEntity($comunePopolazioneTumoriTest, $this->request->getData());
            if ($this->ComunePopolazioneTumoriTest->save($comunePopolazioneTumoriTest)) {
                $this->Flash->success(__('The comune popolazione tumori test has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comune popolazione tumori test could not be saved. Please, try again.'));
        }
        $this->set(compact('comunePopolazioneTumoriTest'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comune Popolazione Tumori Test id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comunePopolazioneTumoriTest = $this->ComunePopolazioneTumoriTest->get($id);
        if ($this->ComunePopolazioneTumoriTest->delete($comunePopolazioneTumoriTest)) {
            $this->Flash->success(__('The comune popolazione tumori test has been deleted.'));
        } else {
            $this->Flash->error(__('The comune popolazione tumori test could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function query()
    {
        $query = $this->ComunePopolazioneTumoriTest->find()
            ->select([
                'ComunePopolazioneTumoriTest.anno',
                'ComunePopolazioneTumoriTest.sesso',
                'ComunePopolazioneTumoriTest.Popolazione',
                'Comuni.Descrizione',
                'Distretti.Descrizione',
                'Asl.Descrizione',
                'Classi.classe_eta',
                'Classi.peso_eu'
            ])
            ->contain(['Comuni' => ['Distretti.Asl'],
            'Classi'])
            ->where(['ComunePopolazioneTumoriTest.Anno' => 2020])
            ->toArray();
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode(compact('query')));

        return $response;
    }


    public function sommaPopolazione()
    {
        $this->autoRender = false;
        $this->response = $this->response->withType('application/json');
        $ComunePopolazioneTumoriTestTable = new ComunePopolazioneTumoriTestTable();
        $SommaPopolazione2020 = $ComunePopolazioneTumoriTestTable->estraiTotale('popolazione', '2020');
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode(compact('SommaPopolazione2020')));
        return $response;
    }

    public function riceviDati() {
        // Verifica che la richiesta sia di tipo POST
        if ($this->request->is('post')) {
            // Accedi ai dati inviati dal frontend
            $dati = $this->request->getData();
            $this->set([
                'message' => 'Dati ricevuti con successo',
                'data' => $dati, // Aggiungi i dati alla risposta
                '_serialize' => ['message', 'data'] // Specifica quali chiavi serializzare
            ]);
        } else {
            // Se la richiesta non è di tipo POST, restituisci un errore
            throw new MethodNotAllowedException('Questa azione supporta solo richieste POST');
        }
    }
    
}
