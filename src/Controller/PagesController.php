<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));
		if(in_array('admin', $path)){
			$userList = TableRegistry::get('User')->find();
			$userCount = $userList->count();
			$customerList = TableRegistry::get('User')->find('all')->where(['Role =' => 'Vartotojas']);
			$customerCount = $customerList->count();
			$employeeList = TableRegistry::get('User')->find('all')->where(['Role =' => 'Darbuotojas']);
			$employeeCount = $employeeList->count();
					$this->loadModel("User");

			$this->set(compact('userCount'));
			$this->set(compact('customerCount'));
			$this->set(compact('employeeCount'));

			$query = TableRegistry::get('Reservation')->find();
			$reservationCount = $query->count();
			$approvedReservationList = TableRegistry::get('Reservation')->find('all')->where(['State =' => 'Patvirtinta']);
			$approvedReservationCount = $approvedReservationList->count();

			$submittedReservationList = TableRegistry::get('Reservation')->find('all')->where(['State =' => 'Pateikta']);
			$submittedReservationCount = $submittedReservationList->count();

			$cancelledReservationList = TableRegistry::get('Reservation')->find('all')->where(['State =' => 'Atšaukta']);
			$cancelledReservationCount = $cancelledReservationList->count();

			if($approvedReservationCount != 0){
				$approvedPercent = $approvedReservationCount / $reservationCount * 100;
			} else {
				$approvedPercent = 0;
			} 
			if($cancelledReservationCount != 0){
				$cancelledPercent = $cancelledReservationCount / $reservationCount * 100;
			} else {
				$cancelledPercent = 0;
			} 
			if($submittedReservationCount != 0){
				$submittedPercent = $submittedReservationCount / $reservationCount * 100;
			} else {
				$submittedPercent = 0;
			} 
			
			$foodReservationList = TableRegistry::get('Reservation')->find('all')->where(['Type =' => 'Food']);
			$foodReservationCount = $foodReservationList->count();

			$tableReservationList = TableRegistry::get('Reservation')->find('all')->where(['Type =' => 'Table']);
			$tableReservationCount = $tableReservationList->count();

			$restaurantReservationList = TableRegistry::get('Reservation')->find('all')->where(['Type =' => 'Restaurant']);
			$restaurantReservationCount = $restaurantReservationList->count();
			
			
			$tomorrowReservations = TableRegistry::get('Reservation')->find('all')
			->where(['dateTime <' => date("Y-m-d", strtotime("+2 day")), 
			'dateTime >=' => date("Y-m-d", strtotime("today")),
			'State =' => 'Patvirtinta']);
			$tomorrowReservationsCount = $tomorrowReservations->count();
			$arr = [];$i=0;
			foreach($tomorrowReservations as $reserv){
				$arr[$i] = $reserv->Type;
				$i++;
			}
			$reservedToday = array_unique ($arr);
			
			$daysOffNotViewed= TableRegistry::get('DaysOff')->find('all', array('contain'=>'User'))->select(['Day_from','Day_to','id_Days_off','fk_Employeeid_User','State','Comment','Viewed',
			'User.First_name'])
			->where(['Viewed =' => "Ne", 
			'State =' => "Pateiktas"]);
			$daysOffFirstFull = TableRegistry::get('DaysOff')->find('all', array('order'=>array('DaysOff.Day_from'=>'asc')))->first();
			$daysOffFirst = date("Y-m-d", strtotime($daysOffFirstFull['Day_from']));
			$daysOffNotViewedCount = $daysOffNotViewed->count();
			$this->set(compact('daysOffFirst'));
			$this->set(compact('daysOffNotViewedCount'));
			
			$this->set(compact('reservedToday'));
			$this->set(compact('tomorrowReservationsCount'));

			$this->set(compact('foodReservationCount'));
			$this->set(compact('tableReservationCount'));
			$this->set(compact('restaurantReservationCount'));

			$this->set(compact('approvedPercent'));
			$this->set(compact('cancelledPercent'));
			$this->set(compact('submittedPercent'));
			$this->set(compact('updatedPercent'));

			$this->set(compact('reservationCount'));
			$this->set(compact('approvedReservationCount'));
			$this->set(compact('submittedReservationCount'));
			$this->set(compact('cancelledReservationCount'));
		}
		else if(in_array('employee', $path)){
			$query = TableRegistry::get('Reservation')->find();
			$reservationCount = $query->count();
			$approvedReservationList = TableRegistry::get('Reservation')->find('all')->where(['State =' => 'Patvirtinta']);
			$approvedReservationCount = $approvedReservationList->count();

			$submittedReservationList = TableRegistry::get('Reservation')->find('all', array('limit'=>10, 'contain'=>'User'))->where(['State =' => 'Pateikta']);
			$submittedReservationCount = $submittedReservationList->count();

			$cancelledReservationList = TableRegistry::get('Reservation')->find('all')->where(['State =' => 'Atsaukta']);
			$cancelledReservationCount = $cancelledReservationList->count();

			if($approvedReservationCount != 0){
				$approvedPercent = $approvedReservationCount / $reservationCount * 100;
			} else {
				$approvedPercent = 0;
			} 
			if($cancelledReservationCount != 0){
				$cancelledPercent = $cancelledReservationCount / $reservationCount * 100;
			} else {
				$cancelledPercent = 0;
			} 
			if($submittedReservationCount != 0){
				$submittedPercent = $submittedReservationCount / $reservationCount * 100;
			} else {
				$submittedPercent = 0;
			} 
			
			$foodReservationList = TableRegistry::get('Reservation')->find('all')->where(['Type =' => 'Food']);
			$foodReservationCount = $foodReservationList->count();

			$tableReservationList = TableRegistry::get('Reservation')->find('all')->where(['Type =' => 'Table']);
			$tableReservationCount = $tableReservationList->count();

			$restaurantReservationList = TableRegistry::get('Reservation')->find('all')->where(['Type =' => 'Restaurant']);
			$restaurantReservationCount = $restaurantReservationList->count();
			
			
			$tomorrowReservations = TableRegistry::get('Reservation')->find('all')
			->where(['dateTime <' => date("Y-m-d", strtotime("+2 day")), 
			'dateTime >=' => date("Y-m-d", strtotime("today")),
			'State =' => 'Patvirtinta']);
			$tomorrowReservationsCount = $tomorrowReservations->count();
			$arr = [];$i=0;
			foreach($tomorrowReservations as $reserv){
				$arr[$i] = $reserv->Type;
				$i++;
			}
			$reservedToday = array_unique ($arr);
			
			$this->set(compact('submittedReservationList'));
			$this->set(compact('reservedToday'));
			$this->set(compact('tomorrowReservationsCount'));

			$this->set(compact('foodReservationCount'));
			$this->set(compact('tableReservationCount'));
			$this->set(compact('restaurantReservationCount'));

			$this->set(compact('approvedPercent'));
			$this->set(compact('cancelledPercent'));
			$this->set(compact('submittedPercent'));

			$this->set(compact('reservationCount'));
			$this->set(compact('approvedReservationCount'));
			$this->set(compact('submittedReservationCount'));
			$this->set(compact('cancelledReservationCount'));
		}
        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);


		$this->Auth->allow(['display']);
	}

}
