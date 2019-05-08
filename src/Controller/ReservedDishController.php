<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReservedDish Controller
 *
 * @property \App\Model\Table\ReservedDishTable $ReservedDish
 *
 * @method \App\Model\Entity\ReservedDish[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservedDishController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dish']
        ];
        $reservedDish = $this->paginate($this->ReservedDish);

        $this->set(compact('reservedDish'));
    }

    /**
     * View method
     *
     * @param string|null $id Reserved Dish id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservedDish = $this->ReservedDish->get($id, [
            'contain' => ['Dish']
        ]);

        $this->set('reservedDish', $reservedDish);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservedDish = $this->ReservedDish->newEntity();
        if ($this->request->is('post')) {
            $reservedDish = $this->ReservedDish->patchEntity($reservedDish, $this->request->getData());
            if ($this->ReservedDish->save($reservedDish)) {
                $this->Flash->success(__('The reserved dish has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserved dish could not be saved. Please, try again.'));
        }
        $dish = $this->ReservedDish->Dish->find('list', ['limit' => 200]);
        $this->set(compact('reservedDish', 'dish'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserved Dish id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservedDish = $this->ReservedDish->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservedDish = $this->ReservedDish->patchEntity($reservedDish, $this->request->getData());
            if ($this->ReservedDish->save($reservedDish)) {
                $this->Flash->success(__('The reserved dish has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserved dish could not be saved. Please, try again.'));
        }
        $dish = $this->ReservedDish->Dish->find('list', ['limit' => 200]);
        $this->set(compact('reservedDish', 'dish'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserved Dish id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservedDish = $this->ReservedDish->get($id);
        if ($this->ReservedDish->delete($reservedDish)) {
            $this->Flash->success(__('The reserved dish has been deleted.'));
        } else {
            $this->Flash->error(__('The reserved dish could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
