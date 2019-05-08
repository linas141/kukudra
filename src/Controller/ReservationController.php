<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Auth\BaseAuthorize;
use Cake\I18n\Time;
use Cake\Mailer\Email;
/**
 * Reservation Controller
 *
 * @property \App\Model\Table\ReservationTable $Reservation
 *
 * @method \App\Model\Entity\Reservation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservationController extends AppController
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
					'filter_type' => ['field' => 'Reservation.Type', 'operator' => '='],
					'filter_state' => ['field'=> 'Reservation.State', 'operator' => 'IN'],
					'filter_firstname' => ['field'=> 'Reservation.name', 'operator' => 'LIKE'],
					'filter_lastname' => ['field'=> 'Reservation.lastName', 'operator' => 'LIKE'],
					'filter_IDfrom' => ['field'=> 'Reservation.Number', 'operator' => '>='],
					'filter_IDto' => ['field'=> 'Reservation.Number', 'operator' => '<='],
					'filter_amountofpeople' => ['field'=> 'Reservation.amountOfPeople', 'operator' => '='],
					'filter_dateFrom' => ['field'=> 'Reservation.dateTime', 'operator' => '>='],
					'filter_dateTo' => ['field'=> 'Reservation.dateTime', 'operator' => '<=']
		]);
		
		// get conditions
		$conditions = $this->Filter->getConditions(['session'=>'filter']);
		
		// set url for pagination
    	$this->set('url', $this->Filter->getUrl());
    	$this->paginate = [
			'contain' => ['User','reserved_dish'=>['Dish']],
			'limit'=>$this->Reservation->find('all')->count()
		];
		$this->paginate['conditions']	= $conditions;
		
        $reservation = $this->paginate($this->Reservation);

        $this->set(compact('reservation'));
    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservation->get($id, [
            'contain' => ['User','reserved_dish'=>['dish']]
        ]);

        $this->set('reservation', $reservation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->loadModel("User");		
		$userUnedited = $this->User->find('all', array('order'=>array('User.id_User'=>'asc')));
		$userList = [];$i = 0;
        foreach($userUnedited as $thisUser){
			$userList[$thisUser->id_User] = $thisUser->username . ', ' . $thisUser->First_name . ' ' . $thisUser->Last_name;
		}		
		$this->set(compact('userList')); 

        $reservation = $this->Reservation->newEntity();
        if ($this->request->is('post')) {
			$datairLaikas = $this->request->data['data'].' '.$this->request->data['time'];
			unset($this->request->data['data']);
			unset($this->request->data['time']);
            $reservation = $this->Reservation->patchEntity($reservation, $this->request->getData());
			$reservation->dateTime = $datairLaikas;
            if ($this->Reservation->save($reservation)) {
				if($this->request->data(['selectedDish']) != null){
					$numArray = array_map('intval', $this->request->data(['selectedDish']));
					$reservedDishes = TableRegistry::get('reserved_dish');
					foreach($numArray as $oneItem){
						$newReservedDish = $reservedDishes->newEntity();
						$newReservedDish->Number = $reservation->Number;
						$newReservedDish->fk_dish_id = $oneItem;
						if ($reservedDishes->save($newReservedDish)) {
						}
						else{
							return $this->Flash->error(__('Rezervacijos pridėti nepavyko...'));
						}
					}
				}

                $this->Flash->success(__('Pridėjote rezervaciją!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Rezervacijos pridėti nepavyko...'));
        }
        $this->set(compact('reservation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservation->get($id, [
            'contain' => ['reserved_dish'=>['dish']]
        ]);
		$this->loadModel("User");		
		$userUnedited = $this->User->find('all', array('order'=>array('User.id_User'=>'asc')));
		$userList = [];$i = 0;
        foreach($userUnedited as $thisUser){
			$userList[$thisUser->id_User] = $thisUser->username . ', ' . $thisUser->First_name . ' ' . $thisUser->Last_name;
		}		
		$this->set(compact('userList'));
		if(strtotime($reservation['dateTime']) >0){
			$date = date_format($reservation['dateTime'], 'Y-m-d');
			$time = date_format($reservation['dateTime'], 'H:i');
		}else{
			$date = 0;
			$time = 0;
		}
		$this->set(compact('time')); 
		$this->set(compact('date')); 
		$oldState = $reservation['State'];
		$reservedDishes = TableRegistry::get('reserved_dish');
		$idDishes = $reservedDishes->find()->select(['Number','fk_dish_id'])->where(['Number =' => $id]);
		if(count($idDishes) > 0 && count($reservation->reserved_dish)>0){
			$i=0;
			foreach($idDishes as $dish){
				$dishId[$i] = $dish->fk_dish_id;
				$i++;
			}
			$Dishes = TableRegistry::get('Dish');
			$dishbyId = $Dishes->find('all')->where(['id_Dish IN' => $dishId]);
			foreach($dishbyId as $oneDish){
				$selectedDishes[$oneDish->id_Dish] = $oneDish->id_Dish;
			}		
			$this->set(compact('selectedDishes')); 
		}
		if ($this->request->is(['patch', 'post', 'put'])) {
			$datairLaikas = $this->request->data['data'].' '.$this->request->data['time'];
			unset($this->request->data['data']);
			unset($this->request->data['time']);
            $reservation = $this->Reservation->patchEntity($reservation, $this->request->getData());
			if($this->request->data(['selectedDish']) != null){
				$numArray = array_map('intval', $this->request->data(['selectedDish']));
				if(!isset($selectedDishes)) $selectedDishes[0] = 0;
				foreach($numArray as $oneDish){
					$newArray[$oneDish] = $oneDish;
				}
				if($selectedDishes != $newArray){
					if (($key = array_search(0, $selectedDishes)) !== false) {
						unset($selectedDishes[$key]);
					}
					$delete = array_diff($selectedDishes, $newArray);
					$insert = array_diff($newArray, $selectedDishes);
					if(isset($delete)){
						foreach($delete as $oneItem){
							$reservedDish = $reservedDishes->find()->where(['Number =' => $id, 'fk_dish_id =' => $oneItem])->first();
							if ($reservedDishes->delete($reservedDish)) {
							}
							else{
								return $this->Flash->error(__('Rezervacijos atnaujinti nepavyko...'));
							}
						}
					}
					if(isset($insert)){
						foreach($insert as $oneItem){
							$newReservedDish = $reservedDishes->newEntity();
							$newReservedDish->Number = $id;
							$newReservedDish->fk_dish_id = $oneItem;
							if ($reservedDishes->save($newReservedDish)) {
							}
							else{
								return $this->Flash->error(__('Rezervacijos atnaujinti nepavyko...'));
							}
						}
					}
					
				}
			}
			else if($selectedDishes != null){
				foreach($selectedDishes as $selectedDish){
					$reservedDish = $reservedDishes->find('all')->where(['reserved_dish.Number =' => $id, 'fk_dish_id =' => $selectedDish])->first();
					if ($reservedDishes->delete($reservedDish)) {
					}
					else{
						return $this->Flash->error(__('Rezervacijos atnaujinti nepavyko...'));
					}
				}
			}
			$reservation->dateTime = $datairLaikas;
            if ($this->Reservation->save($reservation)) {
				$newState = $this->request->data['State'];
				$userid = $reservation->Reserver;
				//$this->User->id_User = $userid;
				$val = $this->User->find()->select(['username'])->where(['id_User ='=>$userid])->first();
				$username = $val->username;
				if($oldState!= $newState){
					if($newState =='Patvirtinta'){
						$email = new Email();
						$email
							->to($username)
							->template('reservationapproved', 'fancy')
							->emailFormat('html')
							->subject('Jūsų rezervacija patvirtinta!')
							->viewVars([
								'reservation' => $reservation
							])
							->send();	
					}
					else if($newState =='Atšaukta'){
						$email = new Email();
						$email
							->to($username)
							->template('reservationdenied', 'fancy')
							->emailFormat('html')
							->subject('Jūsų rezervacija atmesta.')
							->viewVars([
								'reservation' => $reservation
							])
							->send();	
					}
				}
                $this->Flash->success(__('Atnaujinote rezervaciją!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Rezervacijos atnaujinti nepavyko...'));
        }
        $this->set(compact('reservation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservation->get($id);
        if ($this->Reservation->delete($reservation)) {
            $this->Flash->success(__('Panaikinote rezervaciją!'));
        } else {
            $this->Flash->error(__('Rezervacijos panaikinti nepavyko...'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
   	// A method for adding reservation through page
	public function addreservation(){
		$reservedDatesListFirst = $this->Reservation->find('all')
                    ->select(['dateTime'])
					->having(['count(*) >=' => 2])
					->group(['dateTime'])
                    ->where(['dateTime >' => Time::now(),
					'Type' => 'Table',
					'State' => 'Patvirtinta'
					]);
		$reservedDatesRestaurantList = $this->Reservation->find('all')
                    ->select(['dateTime'])
					->group(['dateTime'])
                    ->where(['dateTime >' => Time::now(),
					'Type =' => 'Restaurant',
					'State =' => 'Patvirtinta'
					]);
		$reservedDatesRestaurantList = array_unique($reservedDatesRestaurantList
			->extract('dateTime')
			->toArray());
		$reservedDatesList = $reservedDatesListFirst
			->extract('dateTime')
			->toArray();

		for($i = 0; $i < count($reservedDatesRestaurantList); $i++){
			$reservedDatesRestaurant[$i] =  date("n-j-Y", strtotime($reservedDatesRestaurantList[$i]));
		}
		$reservedDates=[];
		$reservedDateTime=[];
		for($i = 0; $i < count($reservedDatesList); $i++){
			$reservedDates[$i] =  date("n-j-Y", strtotime($reservedDatesList[$i]));
			$reservedDateTime[$i] = date("Y-m-d H-i-s", strtotime($reservedDatesList[$i]));
		}
		if(!isset($reservedDates)) $reservedDates = 0;
		if(!isset($reservedDatesRestaurant)) $reservedDatesRestaurant = 0;
		$this->set(compact('reservedDatesRestaurant'));
		$this->set(compact('reservedDateTime'));
		$this->set(compact('reservedDates'));
		
		if ($this->request->is('post')) {
			$reservation_table = TableRegistry::get('Reservation');
            $newreservation = $reservation_table->newEntity();
			$newreservation->Date = date("Y-m-d");
			$newreservation->Reserver = $this->request->getsession()->read('Auth.User.id_User');
			$newreservation->State = "Pateikta";
			$newreservation->Type = $_POST["selectedType"];
			$newreservation->name = $_POST["name"];
			$newreservation->lastName = $_POST["lastName"];
			$newreservation->email = $_POST["email"];
			$newreservation->phone = $_POST["phone"];
			$newreservation->amountOfPeople = $_POST["amountOfPeople"];
			$newreservation->dateTime = $_POST["datepicker2"].' '.$_POST["timepicker"];
			if($newreservation->amountOfPeople==null || $newreservation->email==null || $newreservation->phone == null || $newreservation->dateTime ==null){
				$this->Flash->error(__('Rezervacijos pridėti nepavyko...'));
				return;
			}
			if($newreservation->Type == 'Table' && in_array($newreservation->dateTime, $reservedDatesList)){
				$this->Flash->error(__('Rezervacijos pridėti nepavyko...'));
				return;
			}
			if($newreservation->Type == 'Restaurant' && in_array(date("n-j-Y",strtotime($newreservation->dateTime)), $reservedDatesRestaurant)){
				$this->Flash->error(__('Rezervacijos pridėti nepavyko...'));
				return;
			}
			$selectedDish = $this->request->data(['selectedDish']);
			if($reservation_table->save($newreservation))
			{
				if($selectedDish != null){
					$numArray = array_map('intval', $selectedDish);
					$reservedDishes = TableRegistry::get('reserved_dish');
					foreach($numArray as $oneItem){
						$newReservedDish = $reservedDishes->newEntity();
						$newReservedDish->Number = $newreservation->Number;
						$newReservedDish->fk_dish_id = $oneItem;
						if ($reservedDishes->save($newReservedDish)) {
						}
						else{
							return $this->Flash->error(__('Rezervacijos pridėti nepavyko...'));
						}
					}
				}
				$this->Flash->success(__('Pateikėte rezervaciją! Pasikeitus būsenai, gausite el. paštu pranešimą.'));
			}
			else $this->Flash->error(__('Rezervacijos pridėti nepavyko...'));
		}
	}
	
	public function keisti($id = null)
    {
        $reservation = $this->Reservation->get($id, [
            'contain' => ['reserved_dish'=>['Dish']]
        ]);
		if($reservation->State != 'Pateikta'){
            $this->Flash->error(__('Šios rezervacijos redaguoti nebegalite!'));
			return $this->redirect(['controller' => 'User', 'action' => 'profile']);
		}
		if($this->request->getSession()->read('Auth.User')['id_User'] != $reservation['Reserver']){
            $this->Flash->error(__('Įvyko klaida!'));
			return $this->redirect(['controller' => 'User', 'action' => 'profile']);
		}
		$reservedDishes = TableRegistry::get('reserved_dish');
		$idDishes = $reservedDishes->find()->select(['Number','fk_dish_id'])->where(['Number =' => $id]);
		$selectedDishes = [];
		if(count($idDishes) > 0 && count($reservation->reserved_dish)>0){
			$i=0;
			foreach($idDishes as $dish){
				$dishId[$i] = $dish->fk_dish_id;
				$i++;
			}
			$Dishes = TableRegistry::get('Dish');
			$dishbyId = $Dishes->find('all')->where(['id_Dish IN' => $dishId]);
			foreach($dishbyId as $oneDish){
				$selectedDishes[$oneDish->id_Dish] = $oneDish->id_Dish;
			}		
			$this->set(compact('selectedDishes')); 
		}
		if ($this->request->is(['patch', 'post', 'put'])) {
			$reservation = $this->Reservation->patchEntity($reservation, $this->request->getData());
			unset($reservation['dateTime']);
			unset($this->request->data['date']);unset($this->request->data['time']);
			if($this->request->data(['selectedDish']) != null){
				$numArray = array_map('intval', $this->request->data(['selectedDish']));
				if(!isset($selectedDishes)) $selectedDishes[0] = 0;
				foreach($numArray as $oneDish){
					$newArray[$oneDish] = $oneDish;
				}
				if($selectedDishes != $newArray){
					if (($key = array_search(0, $selectedDishes)) !== false) {
						unset($selectedDishes[$key]);
					}
					$delete = array_diff($selectedDishes, $newArray);
					$insert = array_diff($newArray, $selectedDishes);
					if(isset($delete)){
						foreach($delete as $oneItem){
							$reservedDish = $reservedDishes->find()->where(['Number =' => $id, 'fk_dish_id =' => $oneItem])->first();
							if ($reservedDishes->delete($reservedDish)) {
							}
							else{
								return $this->Flash->error(__('Rezervacijos atnaujinti nepavyko...'));
							}
						}
					}
					if(isset($insert)){
						foreach($insert as $oneItem){
							$newReservedDish = $reservedDishes->newEntity();
							$newReservedDish->Number = $id;
							$newReservedDish->fk_dish_id = $oneItem;
							if ($reservedDishes->save($newReservedDish)) {
							}
							else{
								return $this->Flash->error(__('Rezervacijos atnaujinti nepavyko...'));
							}
						}
					}
					
				}
			}
			else if($selectedDishes != null){
				foreach($selectedDishes as $selectedDish){
					$reservedDish = $reservedDishes->find('all')->where(['reserved_dish.Number =' => $id, 'fk_dish_id =' => $selectedDish])->first();
					if ($reservedDishes->delete($reservedDish)) {
					}
					else{
						return $this->Flash->error(__('Rezervacijos atnaujinti nepavyko...'));
					}
				}
			}
            if ($this->Reservation->save($reservation)) {
                $this->Flash->success(__('Atnaujinote rezervaciją!'));

                return $this->redirect(['controller'=>'User','action' => 'profile']);
            }
            $this->Flash->error(__('Rezervacijos atnaujinti nepavyko...'));
        }

        $this->set(compact('reservation'));
		if($reservation['dateTime']!=null){
			$date = date_format($reservation['dateTime'], 'Y-m-d');
			$time = date_format($reservation['dateTime'], 'H:i');
		}else{
			$date = 0;
			$time = 0;
		}
		
		$this->set(compact('time')); 
		$this->set(compact('date')); 
    }

	public function userDeletes($id = null)
    {
		$reservation = $this->Reservation->get($id);
		if($this->request->getSession()->read('Auth.User')['id_User'] != $reservation['Reserver']){
            $this->Flash->error(__('Įvyko klaida!'));
			return $this->redirect(['controller' => 'User', 'action' => 'profile']);
		}
        if ($this->Reservation->delete($reservation)) {
            $this->Flash->success(__('Panaikinote rezervacija!'));
        } else {
            $this->Flash->error(__('Rezervacijos panaikinti nepavyko...'));
        }
        return $this->redirect(['controller' => 'User', 'action' => 'profile']);
    }

	public function submit($id = null, $submit)
    {
        $reservation = $this->Reservation->get($id, [
            'contain' => ['User']
        ]);
		$reservation = $this->Reservation->patchEntity($reservation, $this->request->getData());
		($submit === "submit") ?	$reservation->State = "Patvirtinta" : $reservation->State = "Atšaukta";
		if ($this->Reservation->save($reservation)) {
			$this->Flash->success(__('Rezervacija ') . $reservation->State . '!');
			return $this->redirect(['controller'=>'pages', 'action' => 'display','employee']);
		}
		$this->Flash->error(__('Rezervacijos patvirtinti nepavyko...'));
    }

	// Method that is called before load. Loading it's parent is necessary
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		$reservationStateOptions =  array( 'Atšaukta' => 'Atšaukta', 'Pateikta' => 'Pateikta', 
		'Patvirtinta' => 'Patvirtinta');
		$this->set(compact('reservationStateOptions')); 
		
		$selectedAmountOfPeople =  array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => 'Daugiau nei 10');
		$this->set(compact('selectedAmountOfPeople')); 


		$workHours =  array( '11:00' => '11:00', '12:00' => '12:00', '13:00' => '13:00', '14:00' => '14:00', '15:00' => '15:00', '16:00' => '16:00',
		'17:00' => '17:00', '18:00' => '18:00', '19:00' => '19:00', '20:00' => '20:00', '21:00' => '21:00', '22:00' =>'22:00');
		$this->set(compact('workHours')); 

		$selectedAction =  array( 'sas'=>'Veiksmai','delete'=>'Trinti', 'approve'=>'Patvirtinti', 'cancel' => 'Atšaukti');
		$this->set(compact('selectedAction')); 

		$reservationType =  array( 'Food' => 'Maisto', 'Table' => 'Stalelio', 'Restaurant' => 'Salės');
		$this->set(compact('reservationType')); 

		$dishTable = TableRegistry::get('Dish');
		$dishes = $dishTable->find('all')->select(['Name', 'Price', 'id_Dish']);
		foreach($dishes as $dish){
			$dishList[$dish->id_Dish] = $dish->Name . ' €' . $dish->Price;
		}		

		$this->set(compact('dishList')); 
		
		$this->Auth->deny('addreservation');
	}
	
	// Managing authorization inside this controller
	public function isAuthorized($user) {
		if($this->request->getParam('action')==='addreservation' ||
		$this->request->getParam('action')==='userDeletes' ||
		$this->request->getParam('action')==='keisti')
		{
			return true;
		} 
		else if($user['role']=='darbuotojas')
			return true;
		else if($this->request->getSession()->read('Auth.User')['role']=='admin')return true;

		else return false;
    }
}
