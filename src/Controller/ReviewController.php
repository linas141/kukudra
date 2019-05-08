<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Event\Event;

/**
 * Review Controller
 *
 * @property \App\Model\Table\ReviewTable $Review
 *
 * @method \App\Model\Entity\Review[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReviewController extends AppController
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
					'filter_type' => ['field' => 'Review.Viewed', 'operator' => 'LIKE'],
					'filter_username' => ['field'=> 'User.username', 'operator' => 'LIKE'],
					'filter_datefrom' => ['field'=> 'Review.datePublished', 'operator' => '>='],
					'filter_dateto' => ['field'=> 'Review.datePublished', 'operator' => '<='],
					'filter_IDfrom' => ['field'=> 'Review.id_Review', 'operator' => '<='],
					'filter_IDto' => ['field'=> 'Review.id_Review', 'operator' => '>='],
					'filter_ratingfrom' => ['field'=> 'Review.rating', 'operator' => '>='],
					'filter_ratingto' => ['field'=> 'Review.rating', 'operator' => '<=']
		]);
		
		// get conditions
		$conditions = $this->Filter->getConditions(['session'=>'filter']);
		
		// set url for pagination
    	$this->set('url', $this->Filter->getUrl());

    	// apply conditions to pagination
        $this->paginate = [
            'contain' => ['User', 'enviroment_review', 'food_review', 'employee_review'=>['User']],
			'limit'=>$this->Review->find('all')->count()
        ];
		$this->paginate['conditions']	= $conditions;
		

        $review = $this->paginate($this->Review);

        $this->set(compact('review'));
    }

    /**
     * View method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $review = $this->Review->get($id, [
            'contain' => ['User', 'enviroment_review', 'food_review', 'employee_review'=>['User']]
        ]);

        $this->set('review', $review);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $review = $this->Review->newEntity();
		$userList = TableRegistry::get('User');
		$employeeList = $userList->find('all')
			->select(['First_name', 'Last_name', 'id_User', 'username'])
			->where(['role =' => 'darbuotojas']);
		foreach($employeeList as $employee){
			$employees[$employee->id_User] = $employee->username .' (' . substr($employee->First_name, 0, 1) . '. ' . $employee->Last_name . ')';
		}
		$this->set(compact('employees'));

        if ($this->request->is('post')) {
			$reviewContent = $this->request->data(['Review']);
			unset($this->request->data['Review']);
            $review = $this->Review->patchEntity($review, $this->request->getData());
			$review->Review = $reviewContent;
			$selectedType = $this->request->data['selectedType'];
			if($this->Review->save($review)){
				if($selectedType === 'employee'){
					$employees = TableRegistry::get('employee_review');
					$employee = $employees->newEntity();
					$employee->id_Review = $review->id_Review;
					$employee->employee_fkID = $this->request->data['employeeID'];
					if($employees->save($employee)){
						$this->Flash->success(__('Atsiliepimas pridėtas'));
				return $this->redirect(['action' => 'index']);
					}
					else $this->Flash->error(__('Atsiliepimo pridėti nepavyko..'));
				}
				else if($selectedType === 'enviroment'){
					$enviroments = TableRegistry::get('enviroment_review');
					$enviromentAdd = $enviroments->newEntity();
					$enviromentAdd->id_Review = $review->id_Review;
					if($enviroments->save($enviromentAdd)){
						$this->Flash->success(__('Atsiliepimas pridėtas'));
						return $this->redirect(['action' => 'index']);
					}
				}
				else if($selectedType === 'food'){
					$foods = TableRegistry::get('food_review');
					$foodAdd = $foods->newEntity();
					$foodAdd->id_Review = $review->id_Review;
					if($foods->save($foodAdd)){
						$this->Flash->success(__('Atsiliepimas pridėtas'));
						return $this->redirect(['action' => 'index']);
					}
				}
			}
			else {
				$this->Flash->error(__('Atsiliepimo prid nepavyko'));
				return $this->redirect(['action' => 'index']);
			}
        }
		$user = $this->Review->User->find('all');
		$userselect=[];
		foreach($user as $vart){
			$userselect[$vart->id_User] = $vart->username . ', ' . $vart->First_name . ' ' . $vart->Last_name;
		}
        $this->set(compact('review', 'userselect'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $review = $this->Review->get($id, [
            'contain' => ['User', 'enviroment_review', 'food_review', 'employee_review'=>['User']]
        ]);
		if(!empty($review->enviroment_review)) $reviewType='enviroment'; 
			elseif (!empty($review->food_review)) $reviewType ='food'; 
			elseif(!empty($review->employee_review)) {
				$reviewType ='employee'; 
				$employeenr = $review->employee_review[0]->user->id_User;
				$this->set(compact('employeenr'));
			}
			else $reviewType= 'Nėra tipo!';				
        $this->set(compact('reviewType'));
		$userList = TableRegistry::get('User');
		$employeeList = $userList->find('all')
			->select(['First_name', 'Last_name', 'id_User', 'username'])
			->where(['role =' => 'darbuotojas']);
		$i = 0;
		foreach($employeeList as $employee){
			$employees[$employee->id_User] = $employee->username .' (' . substr($employee->First_name, 0, 1) . '. ' . $employee->Last_name . ')';
			$i++;
		}
		$this->set(compact('employees'));
        if ($this->request->is(['patch', 'post', 'put'])) {
			$reviewContent = $this->request->data(['Review']);
			unset($this->request->data['Review']);
            $review = $this->Review->patchEntity($review, $this->request->getData());
			$review->Review = $reviewContent;
			$selectedType = $this->request->data['selectedType'];
			if($reviewType != $this->request->data['selectedType']) {
				if($reviewType === 'employee'){
					$deleteTable = TableRegistry::get('employee_review');
					$deleteRecord = $deleteTable->get($id);
				}
				else if($reviewType === 'enviroment'){
					$deleteTable = TableRegistry::get('enviroment_review');
					$deleteRecord = $deleteTable->get($id);
				}
				else if($reviewType === 'food'){
					$deleteTable = TableRegistry::get('food_review');
					$deleteRecord = $deleteTable->get($id);
				}
				else {
					$this->Flash->error(__('Atsiliepimo atnaujinti nepavyko'));
					return $this->redirect(['action' => 'index']);
				}
				if($selectedType === 'employee'){
					$employees = TableRegistry::get('employee_review');
					$employee = $employees->newEntity();
					$employee->id_Review = $id;
					$employee->employee_fkID = $this->request->data['employeeID'];
					if($employees->save($employee) && $this->Review->save($review)){
						$deleteTable->delete($deleteRecord);
						$this->Flash->success(__('Atsiliepimas atnaujintas'));
						return $this->redirect(['action' => 'index']);
					}
				}
				else if($selectedType === 'enviroment'){
					$enviroments = TableRegistry::get('enviroment_review');
					$enviromentAdd = $enviroments->newEntity();
					$enviromentAdd->id_Review = $id;
					if($enviroments->save($enviromentAdd) && $this->Review->save($review)){
						$deleteTable->delete($deleteRecord);
						$this->Flash->success(__('Atsiliepimas atnaujintas'));
						return $this->redirect(['action' => 'index']);
					}
				}
				else if($selectedType === 'food'){
					$foods = TableRegistry::get('food_review');
					$foodAdd = $foods->newEntity();
					$foodAdd->id_Review = $id;
					if($foods->save($foodAdd) && $this->Review->save($review)){
						$deleteTable->delete($deleteRecord);
						$this->Flash->success(__('Atsiliepimas atnaujintas'));
						return $this->redirect(['action' => 'index']);
					}
				}
				else {
					$this->Flash->error(__('Atsiliepimo atnaujinti nepavyko'));
					return $this->redirect(['action' => 'index']);
				}
			} else {
				if($reviewType === 'employee'){
					$employeetable = TableRegistry::get('employee_review');
					$empreview = $employeetable->find()->where(['id_Review ='=>$id])->first();
					$empreview->employee_fkID = $this->request->data['employeeID'];
					if($employeetable->save($empreview) && $this->Review->save($review)){
						$this->Flash->success(__('Atsiliepimas atnaujintas'));
						return $this->redirect(['action' => 'index']);
					}
				}
				else{
					if ($this->Review->save($review)) {
						$this->Flash->success(__('Atsiliepimas atnaujintas.'));
						return $this->redirect(['action' => 'index']);
					}
				}
				$this->Flash->error(__('Atsiliepimo atnaujinti nepavyko.'));
			}
        }
		$user = $this->Review->User->find('all');
		$userselect=[];$i=0;
		foreach($user as $vart){
			$userselect[$vart->id_User] = $vart->username . ', ' . $vart->First_name . ' ' . $vart->Last_name;$i++;
		}
        $this->set(compact('review', 'userselect'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Review->get($id);
        if ($this->Review->delete($review)) {
            $this->Flash->success(__('Atsiliepimas ištrintas!'));
        } else {
            $this->Flash->error(__('Atsiliepimo ištrinti nepavyko...'));
        }

        return $this->redirect($this->referer());
    }
	public function employees()
    {				
		$emps = TableRegistry::get('employee_review');
		$reviews = $emps->find('all', array('order' => 'review.rating DESC'))->contain(['User', 'review'=>['User']])->where(['employee_fkID ='=>$this->request->getsession()->read('Auth.User.id_User')]);
        $this->set(compact('reviews'));
    }

	public function keisti($id = null)
    {
        $review = $this->Review->get($id);
		$this->set(compact('review'));
		if($this->request->getSession()->read('Auth.User')['id_User'] != $review['fk_Userid_User']){
            $this->Flash->error(__('Įvyko klaida!'));
			return $this->redirect(['controller' => 'User', 'action' => 'profile']);
		}
		        $review = $this->Review->get($id, [
            'contain' => ['User', 'enviroment_review', 'food_review', 'employee_review'=>['User']]
        ]);
		if(!empty($review->enviroment_review)) $reviewType='enviroment'; 
			elseif (!empty($review->food_review)) $reviewType ='food'; 
			elseif(!empty($review->employee_review)) {
				$reviewType ='employee'; 
				$employeenr = $review->employee_review[0]->user->id_User;
				$this->set(compact('employeenr'));
			}
			else $reviewType= 'Nėra tipo!';				
        $this->set(compact('reviewType'));
		$userList = TableRegistry::get('User');
		$employeeList = $userList->find('all')
			->select(['First_name', 'Last_name', 'id_User', 'username'])
			->where(['role =' => 'darbuotojas']);
		$i = 0;
		foreach($employeeList as $employee){
			$employees[$employee->id_User] = substr($employee->First_name, 0, 1) . '. ' . $employee->Last_name;
			$i++;
		}
		$this->set(compact('employees'));

        if ($this->request->is(['patch', 'post', 'put'])) {
			$reviewContent = $this->request->data(['Review']);
			unset($this->request->data['Review']);
            $review = $this->Review->patchEntity($review, $this->request->getData());
			$review->Review = $reviewContent;
			$selectedType = $this->request->data['selectedType'];
			if($reviewType != $this->request->data['selectedType']) {
				if($reviewType === 'employee'){
					$deleteTable = TableRegistry::get('employee_review');
					$deleteRecord = $deleteTable->get($id);
				}
				else if($reviewType === 'enviroment'){
					$deleteTable = TableRegistry::get('enviroment_review');
					$deleteRecord = $deleteTable->get($id);
				}
				else if($reviewType === 'food'){
					$deleteTable = TableRegistry::get('food_review');
					$deleteRecord = $deleteTable->get($id);
				}
				else {
					$this->Flash->error(__('Atsiliepimo atnaujinti nepavyko'));
						return $this->redirect(['controller'=>'user', 'action' => 'profile']);
				}
				if($selectedType === 'employee'){
					$employees = TableRegistry::get('employee_review');
					$employee = $employees->newEntity();
					$employee->id_Review = $id;
					$employee->employee_fkID = $this->request->data['employeeID'];
					if($employees->save($employee) && $this->Review->save($review)){
						$deleteTable->delete($deleteRecord);
						$this->Flash->success(__('Atsiliepimas atnaujintas'));
						return $this->redirect(['controller'=>'user', 'action' => 'profile']);
					}
				}
				else if($selectedType === 'enviroment'){
					$enviroments = TableRegistry::get('enviroment_review');
					$enviromentAdd = $enviroments->newEntity();
					$enviromentAdd->id_Review = $id;
					if($enviroments->save($enviromentAdd) && $this->Review->save($review)){
						$deleteTable->delete($deleteRecord);
						$this->Flash->success(__('Atsiliepimas atnaujintas'));
						return $this->redirect(['controller'=>'user', 'action' => 'profile']);
					}
				}
				else if($selectedType === 'food'){
					$foods = TableRegistry::get('food_review');
					$foodAdd = $foods->newEntity();
					$foodAdd->id_Review = $id;
					if($foods->save($foodAdd) && $this->Review->save($review)){
						$deleteTable->delete($deleteRecord);
						$this->Flash->success(__('Atsiliepimas atnaujintas'));
						return $this->redirect(['controller'=>'user', 'action' => 'profile']);
					}
				}
				else {
					$this->Flash->error(__('Atsiliepimo atnaujinti nepavyko'));
						return $this->redirect(['controller'=>'user', 'action' => 'profile']);
				}
			} else {
				if($reviewType === 'employee'){
					$employeetable = TableRegistry::get('employee_review');
					$empreview = $employeetable->find()->where(['id_Review ='=>$id])->first();
					$empreview->employee_fkID = $this->request->data['employeeID'];
					if($employeetable->save($empreview) && $this->Review->save($review)){
						$this->Flash->success(__('Atsiliepimas atnaujintas'));
						return $this->redirect(['controller'=>'user', 'action' => 'profile']);
					}
				}
				else{
					if ($this->Review->save($review)) {
						$this->Flash->success(__('Atsiliepimas atnaujintas.'));
						return $this->redirect(['controller'=>'user', 'action' => 'profile']);
					}
				}
				$this->Flash->error(__('Atsiliepimo atnaujinti nepavyko.'));
			}
        }
				$user = $this->Review->User->find('all');
		$userselect=[];$i=0;
		foreach($user as $vart){
			$userselect[$vart->id_User] = $vart->username . ', ' . $vart->First_name . ' ' . $vart->Last_name;$i++;
		}
        $this->set(compact('review', 'userselect'));

    }

	public function userDeletes($id = null)
    {
		$review = $this->Review->get($id);
		if($this->request->getSession()->read('Auth.User')['id_User'] != $review['fk_Userid_User']){
            $this->Flash->error(__('Įvyko klaida!'));
			return $this->redirect(['controller' => 'User', 'action' => 'profile']);
		}
        if ($this->Review->delete($review)) {
            $this->Flash->success(__('Panaikinote atsiliepimą!'));
        } else {
            $this->Flash->error(__('Atsiliepimo panaikinti nepavyko...'));
        }
        return $this->redirect($this->referer());
    }
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['reviews', 'userDeletes']);
	}

    public function reviews(){
		$userList = TableRegistry::get('User');
		$employeeList = $userList->find('all')
			->select(['First_name', 'Last_name', 'id_User'])
			->where(['role =' => 'darbuotojas']);
		$i = 0;
		foreach($employeeList as $employees){
			$employeearray[$employees->id_User] = substr($employees->First_name, 0, 1) . '. ' . $employees->Last_name;
			$i++;
		}
		$this->set(compact('employeearray'));
		$emps = TableRegistry::get('employee_review');
		$enviroment = TableRegistry::get('enviroment_review');
		$food = TableRegistry::get('food_review');
		        
		$employeeReviews = $emps->find('all', array('order' => 'review.rating DESC'))->contain(['User', 'review'=>['User']]);
		$enviromentReviews = $enviroment->find('all', array('order' => 'review.rating DESC'))->contain(['review'=>['User']]);
		$foodReviews = $food->find('all', array('order' => 'review.rating DESC'))->contain(['review'=>['User']]);
		$this->set(compact('foodReviews'));
		$this->set(compact('employeeReviews'));
		$this->set(compact('enviromentReviews'));
		if ($this->request->is('post')) {
			$review_table = TableRegistry::get('Review');
            $newreview = $review_table->newEntity();
			$rated = intval($_POST['rate']);
			if($rated>5 || $rated<1|| $_POST['reviewText']==''){
				$this->Flash->error(__('Duomenys įvesti neteisingai...'));
				return $this->redirect(['action' => 'reviews']);
			}
			if($_POST['selectedReview']=='employee'){
				$newreview->rating = $rated;
				$newreview->Review = $_POST['reviewText'];
				$newreview->datePublished = date('Y-m-d');
				$newreview->fk_Userid_User = $this->request->getsession()->read('Auth.User.id_User');
				if($result = $review_table->save($newreview)) {
					$employeeTable = TableRegistry::get('employee_review');
					$newEmployeereview = $employeeTable->newEntity();
					$newEmployeereview->employee_fkID = $this->request->data('selected');
					$newEmployeereview->id_Review = $result->id_Review;
					$employeeTable->save($newEmployeereview);
					$this->Flash->success(__('Atsiliepimas pateiktas!'));
					return $this->redirect(['controller'=>'user', 'action' => 'profile']);
				}
			} else if($_POST['selectedReview']=='food'){
				$newreview->rating = $rated;
				$newreview->Review = $_POST['reviewText'];
				$newreview->datePublished = date('Y-m-d');
				$newreview->fk_Userid_User = $this->request->getsession()->read('Auth.User.id_User');
				if($result = $review_table->save($newreview)) {
					$newreview = $food->newEntity();
					$newreview->id_Review = $result->id_Review;
					$food->save($newreview);
					$this->Flash->success(__('Atsiliepimas pateiktas!'));
					return $this->redirect(['controller'=>'user', 'action' => 'profile']);
				}
			} else if($_POST['selectedReview']=='enviroment'){
				$newreview->rating = $rated;
				$newreview->Review = $_POST['reviewText'];
				$newreview->datePublished = date('Y-m-d');
				$newreview->fk_Userid_User = $this->request->getsession()->read('Auth.User.id_User');
				if($result = $review_table->save($newreview)) {
					$newreview = $enviroment->newEntity();
					$newreview->id_Review = $result->id_Review;
					$enviroment->save($newreview);
					$this->Flash->success(__('Atsiliepimas pateiktas!'));
					return $this->redirect(['controller'=>'user', 'action' => 'profile']);
				}
			}
			else {				
				$this->Flash->error(__('Įvyko klaida! Bandykite iš naujo netrukus...'));
				return $this->redirect(['action' => 'reviews']);
			}
			foreach( $newreview->errors() as $errors){
				if(is_array($errors)){
					foreach($errors as $error){
						$this->Flash->error(__($error));
					}
				} else {
					return $this->Flash->error(__($errors));
				}
			}
		}
	}
	public function isAuthorized($user) {
	if($this->request->getSession()->read('Auth.User')['role']=='admin')
		return true;
	else if($this->request->getSession()->read('Auth.User')['role']=='darbuotojas' && $this->request->getParam('action')==='employees')
		return true;
	else if($this->request->getParam('action')==='keisti')
		return true;
	else
		return false;
    }

}
