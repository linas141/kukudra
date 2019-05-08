<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmployeeReview Controller
 *
 * @property \App\Model\Table\EmployeeReviewTable $EmployeeReview
 *
 * @method \App\Model\Entity\EmployeeReview[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeReviewController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->paginate = [
            'contain' => ['review']
        ];
        $employeeReview = $this->paginate($this->EmployeeReview);

        $this->set(compact('employeeReview'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Review id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeReview = $this->EmployeeReview->get($id, [
            'contain' => ['Review']
        ]);

        $this->set('employeeReview', $employeeReview);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeeReview = $this->EmployeeReview->newEntity();
        if ($this->request->is('post')) {
            $employeeReview = $this->EmployeeReview->patchEntity($employeeReview, $this->request->getData());
            if ($this->EmployeeReview->save($employeeReview)) {
                $this->Flash->success(__('The employee review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee review could not be saved. Please, try again.'));
        }
        $this->set(compact('employeeReview'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Review id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeReview = $this->EmployeeReview->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeReview = $this->EmployeeReview->patchEntity($employeeReview, $this->request->getData());
            if ($this->EmployeeReview->save($employeeReview)) {
                $this->Flash->success(__('The employee review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee review could not be saved. Please, try again.'));
        }
        $this->set(compact('employeeReview'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Review id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeReview = $this->EmployeeReview->get($id);
        if ($this->EmployeeReview->delete($employeeReview)) {
            $this->Flash->success(__('The employee review has been deleted.'));
        } else {
            $this->Flash->error(__('The employee review could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
