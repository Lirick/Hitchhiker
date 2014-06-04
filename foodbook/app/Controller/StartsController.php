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
		$this->set("title_for_layout","Foodbook");
		$userswithrating = array();
		
		$users = $this->User->find('all', array('limit' => 8));
		$this->User->Userrating->virtualFields['Rating'] = 0;
		foreach($users as $user){
		$rating = $this->User->Userrating->query(
        "SELECT
        	userto, AVG(rating) as Userrating__Rating
        FROM
        	userratings as Userrating
        WHERE 
        	userto =".$user['User']['id'],"
        AS
        	Userrating
        GROUP BY
        	userto
        "
        );
        $rate = $rating[0];
        $user['Rating'] = $rate;
        $userswithrating[] = $user;
        
		}
		
        $this->set('users',$userswithrating);


        for($i = 0; $i < count($events); $i++){
        	$events[$i]['Event']['picture'] = $Eventpics->getdef($events[$i]['Event']['id']);
        	
        }
		$this->set('events',$events);
    }

    public function userprofile() {

    }

} 
