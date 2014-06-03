<?php
/**
 * Created by PhpStorm.
 * User: zhangda
 * Date: 14-5-10
 * Time: 0:17
 */
App::import('Controller', 'Eventpics');

class StartsController extends AppController {
    public $helpers = array('Html', 'Form');
    var $uses = array('User','Event');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to access startpage
		$this->Auth->allow('index','userprofile');
	}

    public function index() {
		$Eventpics = new EventpicsController;
		$events = $this->Event->find('all', array('limit' => 9));

        $this->set('users',$this->User->find('all', array('limit' => 8)));

        for($i = 0; $i < count($events); $i++){
        	$events[$i]['Event']['picture'] = $Eventpics->getdef($events[$i]['Event']['id']);
        	
        }
		$this->set('events',$events);
    }

    public function userprofile() {

    }

} 
