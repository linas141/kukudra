<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FoodReview Controller
 *
 * @property \App\Model\Table\FoodReviewTable $FoodReview
 *
 * @method \App\Model\Entity\FoodReview[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodReviewController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $foodReview = $this->paginate($this->FoodReview);

        $this->set(compact('foodReview'));
    }

    /**
     * View method
     *
     * @param string|null $id Food Review id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $foodReview = $this->FoodReview->get($id, [
            'contain' => []
        ]);

        $this->set('foodReview', $foodReview);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $foodReview = $this->FoodReview->newEntity();
        if ($this->request->is('post')) {
            $foodReview = $this->FoodReview->patchEntity($foodReview, $this->request->getData());
            if ($this->FoodReview->save($foodReview)) {
                $this->Flash->success(__('The food review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food review could not be saved. Please, try again.'));
        }
        $this->set(compact('foodReview'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Food Review id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $foodReview = $this->FoodReview->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foodReview = $this->FoodReview->patchEntity($foodReview, $this->request->getData());
            if ($this->FoodReview->save($foodReview)) {
                $this->Flash->success(__('The food review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food review could not be saved. Please, try again.'));
        }
        $this->set(compact('foodReview'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Food Review id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $foodReview = $this->FoodReview->get($id);
        if ($this->FoodReview->delete($foodReview)) {
            $this->Flash->success(__('The food review has been deleted.'));
        } else {
            $this->Flash->error(__('The food review could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
