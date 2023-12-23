<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Query Controller
 *
 * @method \App\Model\Entity\Query[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QueryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $results = $this->ComunePopolazione->find('all', array(
            'fields' => array(
                'Comuni.Descrizione',
                'Distretti.Descrizione',
                'ASL.Descrizione',
                'Regioni.Descrizione',
                'Patologie.patologia'
            ),
            'joins' => array(
                array(
                    'table' => 'Comuni',
                    'alias' => 'Comune',
                    'type' => 'INNER',
                    'conditions' => array('ComunePopolazione.IDComune = Comune.IDComune')
                ),
                array(
                    'table' => 'Distretti',
                    'alias' => 'Distretto',
                    'type' => 'INNER',
                    'conditions' => array('Comune.IDDistretto = Distretto.IDDistretto')
                ),
                // ... altre tabelle coinvolte
            ),
            // ... eventuali altri criteri di ricerca o ordinamento
        ));
        
        $this->set('results', $results);
    }

    /**
     * View method
     *
     * @param string|null $id Query id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $query = $this->Query->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('query'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $query = $this->Query->newEmptyEntity();
        if ($this->request->is('post')) {
            $query = $this->Query->patchEntity($query, $this->request->getData());
            if ($this->Query->save($query)) {
                $this->Flash->success(__('The query has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The query could not be saved. Please, try again.'));
        }
        $this->set(compact('query'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Query id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $query = $this->Query->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $query = $this->Query->patchEntity($query, $this->request->getData());
            if ($this->Query->save($query)) {
                $this->Flash->success(__('The query has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The query could not be saved. Please, try again.'));
        }
        $this->set(compact('query'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Query id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $query = $this->Query->get($id);
        if ($this->Query->delete($query)) {
            $this->Flash->success(__('The query has been deleted.'));
        } else {
            $this->Flash->error(__('The query could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
