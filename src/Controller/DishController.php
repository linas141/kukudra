<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Dish Controller
 *
 * @property \App\Model\Table\DishTable $Dish
 *
 * @method \App\Model\Entity\Dish[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DishController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->loadComponent('BRFilter.Filter');
		$this->Filter->addFilter([
					//'filter_id' => ['field' => 'DaysOff.id_Days_off', 'operator'=>'='],
					'filter_type' => ['field' => 'dish.dishType', 'operator' => 'IN'],
					'filter_contains' => ['field'=> 'dish.Contains_products', 'operator' => 'LIKE'],
					'filter_name' => ['field'=> 'dish.Name', 'operator' => 'LIKE'],
					'filter_pricefrom' => ['field'=> 'dish.Price', 'operator' => '>='],
					'filter_priceto' => ['field'=> 'dish.Price', 'operator' => '<='],
					'filter_IDfrom' => ['field'=> 'dish.id_Dish', 'operator' => '>='],
					'filter_IDto' => ['field'=> 'dish.id_Dish', 'operator' => '<=']
		]);
		
		// get conditions
		$conditions = $this->Filter->getConditions(['session'=>'filter']);
		
		// set url for pagination
    	$this->set('url', $this->Filter->getUrl());
    	$this->paginate = ['limit'=>$this->Dish->find('all')->count()];
		$this->paginate['conditions']	= $conditions;
		

        $dish = $this->paginate($this->Dish);

        $this->set(compact('dish'));
    }

    /**
     * View method
     *
     * @param string|null $id Dish id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dish = $this->Dish->get($id, [
            'contain' => []
        ]);

        $this->set('dish', $dish);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dish = $this->Dish->newEntity();
        if ($this->request->is('post')) {
            $dish = $this->Dish->patchEntity($dish, $this->request->getData());
            if ($this->Dish->save($dish)) {
                $this->Flash->success(__('Pridėjote patiekalą.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Patiekalo pridėti nepavyko.'));
        }
        $this->set(compact('dish'));
		$dishTypes=['salotos'=>'Salotos', 'Pagrindiniai'=>'Pagrindiniai patiekalai','uzkandziai'=>"Užkandžiai", 'desertai'=>'Desertai', 'sriubos'=>'Sriubos', 'dienos' =>'Dienos Patiekalai'];
		$this->set(compact('dishTypes'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Dish id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dish = $this->Dish->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dish = $this->Dish->patchEntity($dish, $this->request->getData());
            if ($this->Dish->save($dish)) {
                $this->Flash->success(__('Atnaujinote patiekalą.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Patiekalo atnaujinti nepavyko.'));
        }
        $this->set(compact('dish'));
				$dishTypes=['salotos'=>'Salotos', 'Pagrindiniai'=>'Pagrindiniai patiekalai','uzkandziai'=>"Užkandžiai", 'desertai'=>'Desertai', 'sriubos'=>'Sriubos', 'dienos' =>'Dienos Patiekalai'];
		$this->set(compact('dishTypes'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Dish id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dish = $this->Dish->get($id);
        if ($this->Dish->delete($dish)) {
            $this->Flash->success(__('Ištrynėte patiekalą.'));
        } else {
            $this->Flash->error(__('Patiekalo ištrinti nepavyko.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function meniu(){      
		$this->set('salotos', $this->Dish->find('all', array('order'=>array('Dish.name'=>'asc')))->where(['dishType =' => 'Salotos']));
		$this->set('pagrindiniai', $this->Dish->find('all', array('order'=>array('Dish.name'=>'asc')))->where(['dishType =' => 'Pagrindiniai patiekalai']));
		$this->set('uzkandziai', $this->Dish->find('all', array('order'=>array('Dish.name'=>'asc')))->where(['dishType =' => 'Užkandžiai']));
		$this->set('desertai', $this->Dish->find('all', array('order'=>array('Dish.name'=>'asc')))->where(['dishType =' => 'Desertai']));
		$this->set('sriubos', $this->Dish->find('all', array('order'=>array('Dish.name'=>'asc')))->where(['dishType =' => 'Sriubos']));
		$this->set('dienos', $this->Dish->find('all', array('order'=>array('Dish.name'=>'asc')))->where(['dishType =' => 'Dienos pietūs']));
	}

	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		$this->Auth->allow('meniu');
	}	
	public function isAuthorized($user) {
		if($this->request->getParam('action')==='meniu')
		{
			return true;
		} 
		else if($user['role']=='darbuotojas')
			return true;
		else if($this->request->getSession()->read('Auth.User')['role']=='admin')return true;
				
		else return false;
    }

}
