<?php

class CommentsController extends AppController {
	public $helpers = array('Html', 'Form', 'Paginator');
	
	
	/**
	 * View all comments
	 */
	public function index() {
		$comments = $this->Comment->find('all');
		$this->set('comments', $comments);
	}


}
