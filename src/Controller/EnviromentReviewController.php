<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EnviromentReview Controller
 *
 * @property \App\Model\Table\EnviromentReviewTable $EnviromentReview
 *
 * @method \App\Model\Entity\EnviromentReview[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnviromentReviewController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $enviromentReview = $this->paginate($this->EnviromentReview);

        $this->set(compact('enviromentReview'));
    }

    /**
     * View method
     *
     * @param string|null $id Enviroment Review id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enviromentReview = $this->EnviromentReview->get($id, [
            'contain' => []
        ]);

        $this->set('enviromentReview', $enviromentReview);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enviromentReview = $this->EnviromentReview->newEntity();
        if ($this->request->is('post')) {
            $enviromentReview = $this->EnviromentReview->patchEntity($enviromentReview, $this->request->getData());
            if ($this->EnviromentReview->save($enviromentReview)) {
                $this->Flash->success(__('The enviroment review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enviroment review could not be saved. Please, try again.'));
        }
        $this->set(compact('enviromentReview'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enviroment Review id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enviromentReview = $this->EnviromentReview->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enviromentReview = $this->EnviromentReview->patchEntity($enviromentReview, $this->request->getData());
            if ($this->EnviromentReview->save($enviromentReview)) {
                $this->Flash->success(__('The enviroment review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enviroment review could not be saved. Please, try again.'));
        }
        $this->set(compact('enviromentReview'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enviroment Review id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enviromentReview = $this->EnviromentReview->get($id);
        if ($this->EnviromentReview->delete($enviromentReview)) {
            $this->Flash->success(__('The enviroment review has been deleted.'));
        } else {
            $this->Flash->error(__('The enviroment review could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
