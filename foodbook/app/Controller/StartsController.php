<?php
/**
 * Created by PhpStorm.
 * User: zhangda
 * Date: 14-5-10
 * Time: 0:17
 */

class StartsController extends AppController {
    public $helpers = array('Html', 'Form');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to access startpage
		$this->Auth->allow('index');
	}

    public function index() {

    }

} 
