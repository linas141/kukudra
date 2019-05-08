<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * SpecialOffers Controller
 *
 * @property \App\Model\Table\SpecialOffersTable $SpecialOffers
 *
 * @method \App\Model\Entity\SpecialOffer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpecialOffersController extends AppController
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
					'filter_name' => ['field' => 'specialOffers.Name', 'operator' => 'LIKE'],
					'filter_pricefrom' => ['field'=> 'specialOffers.Price', 'operator' => '>='],
					'filter_priceto' => ['field'=> 'specialOffers.Price', 'operator' => '<='],
					'filter_IDfrom' => ['field'=> 'specialOffers.id_Special_offers', 'operator' => '>='],
					'filter_IDto' => ['field'=> 'specialOffers.id_Special_offers', 'operator' => '<='],
					'filter_datefrom' => ['field'=> 'specialOffers.Date_from', 'operator' => '>='],
					'filter_dateto' => ['field'=> 'specialOffers.Date_to', 'operator' => '<=']
		]);
		
		// get conditions
		$conditions = $this->Filter->getConditions(['session'=>'filter']);
		
		// set url for pagination
    	$this->set('url', $this->Filter->getUrl());
    	$this->paginate = ['limit'=>$this->SpecialOffers->find('all')->count()];
		$this->paginate['conditions']	= $conditions;
        
		
		
		$specialOffers = $this->paginate($this->SpecialOffers);

        $this->set(compact('specialOffers'));
    }

    /**
     * View method
     *
     * @param string|null $id Special Offer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specialOffer = $this->SpecialOffers->get($id, [
            'contain' => []
        ]);

        $this->set('specialOffer', $specialOffer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $specialOffer = $this->SpecialOffers->newEntity();
        if ($this->request->is('post')) {
            $specialOffer = $this->SpecialOffers->patchEntity($specialOffer, $this->request->getData());
            if ($this->SpecialOffers->save($specialOffer)) {
                $this->Flash->success(__('Specialus pasiūlymas pridėtas.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Specialaus pasiūlymo pridėti nepavyko.'));
        }
        $this->set(compact('specialOffer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Special Offer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specialOffer = $this->SpecialOffers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialOffer = $this->SpecialOffers->patchEntity($specialOffer, $this->request->getData());
            if ($this->SpecialOffers->save($specialOffer)) {
                $this->Flash->success(__('Specialus pasiūlymas atnaujintas.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Specialaus pasiūlymo atnaujinti nepavyko.'));
        }
        $this->set(compact('specialOffer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Special Offer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specialOffer = $this->SpecialOffers->get($id);
        if ($this->SpecialOffers->delete($specialOffer)) {
            $this->Flash->success(__('Specialus pasiūlymas pašalintas.'));
        } else {
            $this->Flash->error(__('Specialaus pasiūlymo pašalinti nepavyko.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	
	public function offers(){
		$this->set('offers', $this->SpecialOffers->find('all', array('order'=>array('Name'=>'asc')))->where(['Date_from <=' => date('Y-m-d'), 'Date_to >=' => date('Y-m-d')]));
	}
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		$this->Auth->allow('todaysoffers');
		$this->Auth->allow('offers');
	}	
	public function isAuthorized($user) {
		if($this->request->getParam('action')==='offers' ||
		$this->request->getParam('action')==='todaysoffers')
		{
			return true;
		} 
		else if($user['role']=='darbuotojas')
			return true;
		else if($this->request->getSession()->read('Auth.User')['role']=='admin')return true;
		
		else return false;
    }

}
