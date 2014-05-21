<?php

class CommentsController extends AppController {
	public $helpers = array('Html', 'Form');
	

	/**
	 * Add a comment
	 */
	public function add(){
		if ($this->request->is('post')) {						
			$this->Comment->create();
			$this->Comment->set('user_id', $this->Auth->user('id'));
			
			$eventId = $this->request->params['pass'][0] + 0;
			$this->Comment->set('event_id', $eventId);			
			$this->Comment->set('text', $this->request->data['Comment']['text']);
			$this->Comment->set('time', date('Y-m-d H:i:s')); //check format
			$this->Comment->save($this->request->data);
				
 			$this->Session->setFlash( __("The comment has been added"));
 			return $this->redirect($this->referer());
		}	
	}
	
	
	
	/**
	 * Delete comment 
	 * 
	 * @param int $id Comment Id
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 */
	public function delete($id){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if(!$id){
			throw new NotFoundException(__('Invalid comment'));
		}		
		
		if ($this->Comment->delete($id)) {
			$this->Session->setFlash(__('The comment has been deleted'));
			
			return $this->redirect($this->referer());
		}
		
		
	}
}
