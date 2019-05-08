<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * WorkSchedule Controller
 *
 * @property \App\Model\Table\WorkScheduleTable $WorkSchedule
 *
 * @method \App\Model\Entity\WorkSchedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkScheduleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
	public function index(){
		
		$this->loadComponent('BRFilter.Filter');
		$this->Filter->addFilter([
					//'filter_id' => ['field' => 'DaysOff.id_Days_off', 'operator'=>'='],
					'filter_from' => ['field' => 'WorkSchedule.work_date', 'operator' => '>='],
					'filter_to' => ['field' => 'WorkSchedule.work_date', 'operator' => '<='],
					'filter_state' => ['field'=> 'WorkSchedule.fulfilled', 'operator' => '='],
					'filter_employee' => ['field'=> 'WorkSchedule.employee_fkID', 'operator' => 'IN']
		]);
		
		// get conditions
		$conditions = $this->Filter->getConditions(['session'=>'filter']);
		// set url for pagination
    	$this->set('url', $this->Filter->getUrl());

    	// apply conditions to pagination
        $this->paginate = [
            'contain' => ['User'],
			'limit'=>$this->WorkSchedule->find('all')->count()
        ];
		$this->paginate['conditions']	= $conditions;
		
        $workSchedule  = $this->paginate($this->WorkSchedule);

        $this->set(compact('workSchedule'));

		$events = $this->WorkSchedule->find('all',array('conditions'=>$conditions, 'contain'=>'User',
                'fields'=>array(
				'id',
                'User.First_name', 
				'User.username', 
                'User.Last_name',
				'fulfilled',
                'work_date')));
		$allevents=array();
		
		foreach($events as $event){
			if($event['work_date'] >= date("Y-m-d")){// Date has not been yet
				$allevents[]=array(
					 'id'		 =>$event['id'],
					 'description'  =>$event['user']['username'],
					 'title'     =>$event['user']['First_name'] . ' '.$event['user']['Last_name'] ,
					 'start'     =>$event['work_date'],
					 'backgroundColor'=>'#3c8dbc',
					 'textColor' =>'#000000');
			}
			else if($event['fulfilled']==='No' && $event['work_date'] < date("Y-m-d")){ // Has not showed up in work
				$allevents[]=array(
					 'id'		 =>$event['id'],
					 'description'  =>$event['user']['username'],
					 'title'     =>$event['user']['First_name'] . ' '.$event['user']['Last_name'] ,
					 'start'     =>$event['work_date'],
					 'backgroundColor'=>'#B20000',
					 'textColor' =>'#000000');
			}
			else { // Has fulfilled the work date
				$allevents[]=array(
					 'id'		 =>$event['id'],
					 'description'  =>$event['user']['username'],
					 'title'     =>$event['user']['First_name'] . ' '.$event['user']['Last_name'] ,
					 'start'     =>$event['work_date'],
					 'backgroundColor'=>'#008000',
					 'textColor' =>'#000000');
			}
		}
		$this->set(compact('allevents'));
	}
    /**
     * View method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workSchedule = $this->WorkSchedule->get($id, [
            'contain' => ['User']
        ]);

        $this->set('workSchedule', $workSchedule);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workSchedule = $this->WorkSchedule->newEntity();
        if ($this->request->is('post')) {
            $workSchedule = $this->WorkSchedule->patchEntity($workSchedule, $this->request->getData());
            if ($this->WorkSchedule->save($workSchedule)) {
                $this->Flash->success(__('Darbo dieną sėkmingai pridėjote.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Pridėti nepavyko.'));
        }
        $this->set(compact('workSchedule'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workSchedule = $this->WorkSchedule->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workSchedule = $this->WorkSchedule->patchEntity($workSchedule, $this->request->getData());
            if ($this->WorkSchedule->save($workSchedule)) {
                $this->Flash->success(__('Pakeitėte darbo dienos informaciją!'));

                return $this->redirect(['controller'=>'work-schedule','action' => 'index']);
            }
            $this->Flash->error(__('Išsaugoti nepavyko.'));
        }
        $this->set(compact('workSchedule'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Work Schedule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workSchedule = $this->WorkSchedule->get($id);
        if ($this->WorkSchedule->delete($workSchedule)) {
            $this->Flash->success(__('Ištrynėte darbo dieną!'));
        } else {
            $this->Flash->error(__('Panaikinti nepavyko...'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function myschedule(){
		$events = $this->WorkSchedule->find('all',array('contain'=>'User',
                'fields'=>array(
				'id',
				'fulfilled',
                'work_date',
                'User.First_name', 
                'User.Last_name')))->where(['User.id_User =' => $this->request->getSession()->read('Auth.User')['id_User']]);
		$allevents=array();
		foreach($events as $event){
			if($event['work_date'] >= date("Y-m-d")){// Date has not been yet
				$allevents[]=array(
					 'id'		 =>$event['id'],
					 'title'     =>'Neįvykusi data' ,
					 'start'     =>$event['work_date'],
					 'backgroundColor'=>'#3c8dbc',
					 'textColor' =>'#000000');
			}
			else if($event['fulfilled']==='No' && $event['work_date'] < date("Y-m-d")){ // Has not showed up in work
				$allevents[]=array(
					 'id'		 =>$event['id'],
					 'title'     =>'Nedirbote' ,
					 'start'     =>$event['work_date'],
					 'backgroundColor'=>'#B20000',
					 'textColor' =>'#000000');
			}
			else { // Has fulfilled the work date
				$allevents[]=array(
					 'id'		 =>$event['id'],
					 'title'     =>'Dirbote' ,
					 'start'     =>$event['work_date'],
					 'backgroundColor'=>'#008000',
					 'textColor' =>'#000000');
			}
		}
		$this->set(compact('allevents'));
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
	}
	
	public function isAuthorized($user) {
		if($this->request->getParam('action')==='myschedule' &&
		$this->request->getSession()->read('Auth.User')['role']==='darbuotojas'){
			return true;
		}
		else if($this->request->getSession()->read('Auth.User')['role']=='admin')return true;
		else
			return false;
		return parent ::isAuthorized($user);
    }
}
