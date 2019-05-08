<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $User
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserController extends AppController
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
					'filter_username' => ['field' => 'User.username', 'operator' => 'LIKE'],
					'filter_firstname' => ['field'=> 'User.First_name', 'operator' => 'LIKE'],
					'filter_lastname' => ['field'=> 'User.Last_name', 'operator' => 'LIKE'],
					'filter_role' => ['field'=> 'User.role', 'operator' => '='],
					'filter_IDfrom' => ['field'=> 'User.role', 'operator' => '>='],
					'filter_IDto' => ['field'=> 'User.id_User', 'operator' => '<=']
		]);
		
		// get conditions
		$conditions = $this->Filter->getConditions(['session'=>'filter']);
		
		// set url for pagination
    	$this->set('url', $this->Filter->getUrl());
    	$this->paginate = ['limit'=>$this->User->find('all')->count()];
		$this->paginate['conditions']	= $conditions;
		

        $user = $this->paginate($this->User);

        $this->set(compact('user'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {		
		$user = $this->User->get($id, [
            'contain' => []
        ]);
		$this->set('user', $user);

       // $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->User->newEntity();
        if ($this->request->is('post')) {
            $user = $this->User->patchEntity($user, $this->request->getData());
			if($user->role=='admin'){
				$this->Flash->error(__('Naudotojo pridėti nepavyko...'));
                return $this->redirect(['action' => 'index']);
			}
            if ($this->User->save($user)) {
                $this->Flash->success(__('Vartotojas pridėtas!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Naudotojo pridėti nepavyko...'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->User->get($id, [
            'contain' => []
        ]);
		if($user->role === 'admin'){
			$roleOptions =  array('admin' =>'Vadovas');
			$this->set(compact('roleOptions')); // if you set options from controller
		}
		$buvusirole = $user->role;
        if ($this->request->is(['patch', 'post', 'put'])) {
			if(strlen($this->request->data['password'])<2){
				unset($this->request->data['password']);
			}
            $user = $this->User->patchEntity($user, $this->request->getData());
			if($this->request->data['role'] != $buvusirole && ($this->request->data['role'] === 'admin'
			|| $buvusirole && $buvusirole==='admin')){
              $this->Flash->error(__('Informacijos pakeisti nepavyko!.'));
              return $this->redirect(['action' => 'index']);
			}
            if ($this->User->save($user)) {
                $this->Flash->success(__('Naudotojo informacija pakeista.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Naudotojo informacijos pakeisti nepavyko!.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->User->get($id);
		if($user->role=='admin'){
            $this->Flash->error(__('Bandote panaikinti savo naudotoją({0})! Naikinti nepavyko.', $user->username));
		}
		else {			
			if ($this->User->delete($user)) {
				$this->Flash->success(__('Naudotojas panaikintas.'));
			} else {
				$this->Flash->error(__('Naudotojo panaikinti nepavyko.'));
			}
		}
        return $this->redirect(['action' => 'index']);
    }
	
	public function login()
    {
		
		if($this->request->getSession()->read('Auth.User')){
				$this->Flash->error(__('Jūs jau prisijungęs! Norėdami prisijungti, atsijunkite.'));
				return $this->redirect( Router::url( $this->referer(), true ) );
		}
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
				$id = $this->Auth->user('id_User');
				$this->User->id_User=$id;
				$this->User->updateAll(['Last_IP' => $_SERVER['REMOTE_ADDR']], ['id_User' => $id]);
              if($user['role']=='darbuotojas'){
					return $this->redirect('/darbuotojas');
				}
				elseif($user['role']=='admin'){
					return $this->redirect('/admin');
				}
				return $this->redirect('/');
            }
            $this->Flash->error(__('Neteisingi prisijungimo duomenys!'));
        }
    }
	public function register()
	{
		if($this->request->getSession()->read('Auth.User')){
			$this->Flash->error(__('Jūs jau prisijungęs! Norėdami užsiregistruoti, atsijunkite.'));
			return $this->redirect(['action' => 'profile']);
		}
		//$user = $this->User->newEntity();
		$user = $this->User->newEntity($this->request->getData());
		if($this->request->is('post')){
			$user->role = "vartotojas";
			if($user->errors()){
				foreach( $user->errors() as $errors){
					if(is_array($errors)){
						foreach($errors as $error){
							$this->Flash->error(__($error));
						}
					}else{
						$this->Flash->error(__($errors));
					}
				}
			}
			else {
			$user = $this->User->patchEntity($user, $this->request->data);
				if($this->User->save($user)){
				$email = new Email();
				$email
					->to($user->username)
					->template('welcome', 'fancy')
					->emailFormat('html')
					->subject('Užsiregistravote Kukudroje!')
					->viewVars([
						'user' => $user
					])
					->send();		
					$this->Flash->success(__('Užsiregistravote! Dabar galite prisijungti.'));
					return $this->redirect(['action' => 'login']);
				} else {
					die('b');
				}
			}
		}
		$this->set(compact('user'));
		$this->set('_serialzie', ['user']);
	}

    public function logout()
    {
	//	$this->Cookie->delete('remember_me_cookie');		
	$this->Flash->success('Atsijungėte!');

        return $this->redirect($this->Auth->logout());
    }
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout', 'register', 'profile', 'forgotpassword', 'resetpassword']);
		$roleOptions =  array( 'vartotojas' => 'Vartotojas', 'darbuotojas' => 'Darbuotojas');
		$this->set(compact('roleOptions')); // if you set options from controller
	}
	
	public function isAuthorized($user) {
		if($this->request->getParam('action')==='login' ||
		$this->request->getParam('action')==='register'){
			return true;
		}
		else if($this->request->getSession()->read('Auth.User')['role']=='admin')return true;
		else
			return false;
		return parent ::isAuthorized($user);
    }
	
	public function forgotpassword(){
		if($this->request->is('post')){
			$emailaddress = $this->request->getData('username');
			$generatedToken = Security::hash(Security::randomBytes(25));
			$userTable = TableRegistry::get('User');
			$user = $userTable->find('all')->where(['username ='=>$emailaddress])->first();
			if(!isset($user)){
				return $this->Flash->error(__('Įvyko klaida.. Bandykite vėl!'));
			}
			$user->token = $generatedToken;
			if($userTable->save($user)){
				$this->Flash->success(__('Slaptažodžio atstatymo nuoroda išsiųsta paštu ' . $emailaddress . '!'));
				$email = new Email('default');
				$email
					->emailFormat('html')
					->template('forgotpassword', 'fancy')
					->subject('Slaptažodžio atstatymas » Kukudra')
					->to($emailaddress)
					->viewVars([
						'token' => $generatedToken,
						'user' => $user
					])
					->send();
			}
		}
	}
	
	public function resetpassword($token){
		if($this->request->is('post')){
			$password = $this->request->getData('password');
			$userTable = TableRegistry::get('User');
			$user = $userTable->find('all')->where(['token' => $token])->first();
			if(!isset($user)){
				$this->Flash->error(__('Įvyko klaida.. Bandykite vėl!'));
				return $this->redirect(['action'=>'login']);
			}
			$user->password = $password;
			$user->token = "";
			if($userTable->save($user)){
				$this->Flash->success('Pakeitėte slaptažodį!');
				return $this->redirect(['action'=>'login']);
			}
			else {
				$this->Flash->error('Slaptažodžio pakeisti nepavyko.');
			}
		}
	}
    public function profile()
    {
		$userid = $this->Auth->User('id_User');
		if($userid == null){
            $this->Flash->error(__('Prisijunkite norėdami redaguoti profilį!'));
			return $this->redirect(['action' => 'login']);		
		}
		$user = $this->User->get($userid, [
            'contain' => []
        ]);
		$this->loadModel("Reservation");		
		$this->paginate = ['limit'=>$this->Reservation->find('all')->count()];
		$this->set('userReservation', $this->paginate($this->Reservation->find('all', array('contain'=>['reserved_dish'=>['Dish']],'order'=>array('Reservation.Number'=>'asc')))->where(['Reserver =' => $userid])));

		$this->loadModel("Review");		
		$this->paginate = ['limit'=>$this->Review->find('all')->count()];
		$this->set('userReviews', $this->paginate($this->Review->find('all', array('order'=>array('Review.id_Review'=>'asc'), 'contain'=>(['enviroment_review', 'food_review', 'employee_review'=>['User']])))->where(['fk_Userid_User =' => $userid])));

        if ($this->request->is(['patch', 'post', 'put'])) {
			if(strlen($this->request->data['password']) < 1 && strlen($this->request->data['repeatpassword']) < 1){
				unset($this->request->data['password']);
			} else if($this->request->data['password'] != $this->request->data['repeatpassword']){
				 $this->Flash->error(__('Slaptažodžiai nesutampa!'));
                return $this->redirect(['action' => 'profile']);
			}
            $user = $this->User->patchEntity($user, $this->request->getData());
            if ($this->User->save($user)) {
                $this->Flash->success(__('Pakeitėte informaciją!'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('Informacijos atnaujinti nepavyko!'));
        }
        $this->set(compact('user'));

    }
}
