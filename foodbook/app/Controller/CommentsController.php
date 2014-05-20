<?php
App::uses('Sanitize', 'Utility');


class CommentsController extends AppController {
	public $helpers = array('Html', 'Form', 'Paginator');
	

	/**
	 * Add a comment
	 */
	public function add(){
		if ($this->request->is('post')) {						
			$this->Comment->create();
			$this->Comment->set('user_id', $this->Auth->user('id'));
			
			$eventId = $this->request->params['pass'][0] + 0;
			$this->Comment->set('event_id', $eventId);			
			$this->Comment->set('text', Sanitize::clean($this->request->data['text']));
			$this->Comment->set('time', date('Y-m-d H:i:s')); //check format
			
			$this->Comment->save($this->request->data);
				
 			$this->Session->setFlash( __("The comment has been added"));
 			$this->redirect($this->referer());
		}	
	}
}
