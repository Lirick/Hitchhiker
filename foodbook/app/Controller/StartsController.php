<?php
/**
 * Created by PhpStorm.
 * User: zhangda
 * Date: 14-5-10
 * Time: 0:17
 */

class StartsController extends AppController {
    public $helpers = array('Html', 'Form');
    var $uses = array('User','Event');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to access startpage
		$this->Auth->allow('index','userprofile');
	}

    public function index() {

        $this->set('users',$this->User->find('all', array('limit' => 8)));
        $this->set('events',$this->Event->find('all', array('limit' => 9)));

    }

    public function userprofile() {

    }

} 
