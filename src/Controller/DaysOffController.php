<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;

/**
 * DaysOff Controller
 *
 * @property \App\Model\Table\DaysOffTable $DaysOff
 *
 * @method \App\Model\Entity\DaysOff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DaysOffController extends AppController
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
					'filter_viewed' => ['field' => 'DaysOff.Viewed', 'operator' => 'LIKE'],
					'filter_state' => ['field'=> 'DaysOff.State', 'operator' => 'IN'],
					'filter_from' => ['field'=> 'DaysOff.Day_from', 'operator' => '>='],
					'filter_to' => ['field'=> 'DaysOff.Day_to', 'operator' => '<='],
					'filter_employee' => ['field'=> 'DaysOff.fk_Employeeid_User', 'operator' => 'IN']
		]);
		
		// get conditions
		$conditions = $this->Filter->getConditions(['session'=>'filter']);
		// set url for pagination
    	$this->set('url', $this->Filter->getUrl());

    	// apply conditions to pagination
        $this->paginate = [
            'contain' => ['User'],
			'limit'=>$this->DaysOff->find('all')->count()
        ];
		$this->paginate['conditions']	= $conditions;
		

        $daysOff = $this->paginate($this->DaysOff);

        $this->set(compact('daysOff'));
		
		
		$events = $this->DaysOff->find('all',array('conditions'=>$conditions, 'contain'=>'User',
                'fields'=>array(
				'id_Days_off',
                'User.First_name', 
                'User.Last_name',
				'Day_from',
				'Day_to',
                'State')));
		$allevents=array();
		
		foreach($events as $event){
			if($event['State']==='Patvirtintas'){// Date has not been yet
			$allevents[]=array(
				 'id'		 =>$event['id_Days_off'],
				 'description'  =>$event['user']['username'],
				 'title'     =>$event['user']['First_name'] . ' '.$event['user']['Last_name'] ,
				 'start'     =>$event['Day_from'],
				 'end'     =>$event['Day_to'],
				 'backgroundColor'=>'#008000',
				 'textColor' =>'#000000');
			}
			else if($event['State']==='Pateiktas'){ // Has not showed up in work
				$allevents[]=array(
				 'id'		 =>$event['id_Days_off'],
				 'description'  =>$event['user']['username'],
				 'title'     =>$event['user']['First_name'] . ' '.$event['user']['Last_name'] ,
				 'start'     =>$event['Day_from'],
				 'end'     =>$event['Day_to'],
				 'backgroundColor'=>'#3c8dbc',
				 'textColor' =>'#000000');
			}
		}
		$this->set(compact('allevents'));
    }

    /**
     * View method
     *
     * @param string|null $id Days Off id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $daysOff = $this->DaysOff->get($id, [
            'contain' => ['User']
        ]);

        $this->set('daysOff', $daysOff);
    }
	
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $daysOff = $this->DaysOff->newEntity();
        if ($this->request->is('post')) {
            $daysOff = $this->DaysOff->patchEntity($daysOff, $this->request->getData());
            if ($this->DaysOff->save($daysOff)) {
                $this->Flash->success(__('Atostogų prašymas pridėtas!'));
					$userID = $daysOff['fk_Employeeid_User'];
					$val = $this->User->find()->select(['username'])->where(['id_User ='=>$userID])->first();
					$username = $val->username;
					if($daysOff['State'] === 'Atmestas'){
						$email = new Email();
						$email
							->to($username)
							->template('daysoff', 'fancy')
							->emailFormat('html')
							->subject('Jūsų laisvadieniai atmesti!')
							->viewVars([
								'daysOff' => $daysOff
							])
							->send();	
					}
					else if($daysOff['State'] ==='Patvirtintas'){
						$email = new Email();
						$email
							->to($username)
							->template('daysoff', 'fancy')
							->emailFormat('html')
							->subject('Jūsų laisvadieniai patvirtinti vadovo!')
							->viewVars([
								'daysOff' => $daysOff
							])
							->send();	
					}

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Atostogų prašymo pridėti nepavyko...'));
        }
        $user = $this->DaysOff->User->find('list', ['limit' => 200]);
        $this->set(compact('daysOff', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Days Off id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $daysOff = $this->DaysOff->get($id, [
            'contain' => []
        ]);
		$firstState = $daysOff['State'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $daysOff = $this->DaysOff->patchEntity($daysOff, $this->request->getData());
			$newState = $this->request->data['State'];
			$daysOff->Viewed = "Taip"; 
            if ($this->DaysOff->save($daysOff)) {
                $this->Flash->success(__('Atostogų prašymas atnaujintas!'));
				if($firstState != $newState){
					$userID = $daysOff['fk_Employeeid_User'];
					$val = $this->User->find()->select(['username'])->where(['id_User ='=>$userID])->first();
					$username = $val->username;
					if($newState === 'Atmestas'){
						$email = new Email();
						$email
							->to($username)
							->template('daysoff', 'fancy')
							->emailFormat('html')
							->subject('Jūsų laisvadieniai atmesti!')
							->viewVars([
								'daysOff' => $daysOff
							])
							->send();	
					}
					else if($newState ==='Patvirtintas'){
						$email = new Email();
						$email
							->to($username)
							->template('daysoff', 'fancy')
							->emailFormat('html')
							->subject('Jūsų laisvadieniai patvirtinti vadovo!')
							->viewVars([
								'daysOff' => $daysOff
							])
							->send();	
					}
				}
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Atostogų prašymo atnaujinti nepavyko...'));
        }
        $user = $this->DaysOff->User->find('list', ['limit' => 200]);
        $this->set(compact('daysOff', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Days Off id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $daysOff = $this->DaysOff->get($id);
        if ($this->DaysOff->delete($daysOff)) {
            $this->Flash->success(__('Atostogų prašymas ištrintas!'));
        } else {
            $this->Flash->error(__('Atostogų prašymo ištrinti nepavyko..'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function submit($id = null, $submit)
    {
        $daysOff = $this->DaysOff->get($id, [
            'contain' => []
        ]);
		$daysOff = $this->DaysOff->patchEntity($daysOff, $this->request->getData());
		($submit == "submit") ?	$daysOff->State = "Patvirtintas" : $daysOff->State = "Atmestas";
		if ($this->DaysOff->save($daysOff)) {
			$this->Flash->success(__('Atostogų prašymas ') . $daysOff->State . '!');
			return $this->redirect(['controller'=>'pages', 'action' => 'display','admin']);
		}
		$this->Flash->error(__('Atostogų prašymo patvirtinti nepavyko...'));
    }
	
	
	public function employeesubmitted()
    {
        $daysOff = $this->paginate($this->DaysOff->find('all', array('order'=>array('DaysOff.id_Days_off'=>'asc')))->where(['fk_Employeeid_User =' => $this->Auth->User('id_User')]));
        $this->set(compact('daysOff'));
		
		$daysOffSubmitted = $this->paginate($this->DaysOff->find('all', array('order'=>array('DaysOff.id_Days_off'=>'asc')))->where(['fk_Employeeid_User =' => $this->Auth->User('id_User'), 'State'=>'Pateiktas']));
        $this->set(compact('daysOffSubmitted'));

    }

	
    public function employeeadd()
    {
		$daysOffSubmitted = $this->paginate($this->DaysOff->find('all', array('order'=>array('DaysOff.id_Days_off'=>'asc')))->where(['fk_Employeeid_User =' => $this->Auth->User('id_User'), 'State'=>'Pateiktas']));
        if(count($daysOffSubmitted) > 0){
			$this->Flash->error(__('Jūsų paskutinis pateiktas atostogų prašymas dar nėra patvirtintas!'));
			return $this->redirect(['action' => 'index']);
		}
        $daysOff = $this->DaysOff->newEntity();
        if ($this->request->is('post')) {
            $daysOff = $this->DaysOff->patchEntity($daysOff, $this->request->getData());
			$daysOff->fk_Employeeid_User = $this->Auth->User('id_User');
			$daysOff->State = "Pateiktas";
			$daysOff->Viewed = "Ne";
            if ($this->DaysOff->save($daysOff)) {
                $this->Flash->success(__('Atostogų prašymas pridėtas!'));

                return $this->redirect(['action' => 'employeesubmitted']);
            }
            $this->Flash->error(__('Atostogų prašymo pridėti nepavyko...'));
        }
        $user = $this->DaysOff->User->find('list', ['limit' => 200]);
        $this->set(compact('daysOff', 'user'));
    }

	
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		$this->loadModel("User");
		$employees = $this->User->find('all')->where(['User.role ='=>'darbuotojas']);
		$employeearray = array();
		$i = 0;
		foreach($employees as $employees){
			$employeearray[$employees->id_User] = substr($employees->First_name, 0, 1) . '. ' . $employees->Last_name .' (' . $employees->username . ')';
			$i++;
		}
		$this->set(compact('employeearray')); 	
		$stateSelect = array('Pateiktas' =>'Pateiktas', 'Patvirtintas' =>'Patvirtintas', 'Atmestas' =>'Atmestas');
		$this->set(compact('stateSelect')); 
	}
	
	
	
	public function isAuthorized($user) {
		$this->request->getSession()->read('Auth.User'); 
		if($this->request->getSession()->read('Auth.User')['role']=='darbuotojas'){
			if($this->request->getParam('action')==='employeesubmitted' ||
		$this->request->getParam('action')==='employeeadd'){
				return true;
			}
			else
				return false;
		}
		else if($this->request->getSession()->read('Auth.User')['role']=='admin')return true;
		else 
			return false;
    }
}