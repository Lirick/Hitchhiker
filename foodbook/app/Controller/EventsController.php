<?php

class EventsController extends AppController {
    public $helpers = array('Html', 'Form', 'Paginator');
	
    /**
     * #!todo: 
     * Add paginator to index
     * Add function doc
     * Change label names in the view
     */
     
     public function myevents() {
	    $events = $this->Event->findAllByUserId($this->Auth->user('id'));
	    $this->set('events',$events);
    }
    
     
     
     public function request($id) {
     	if(!$id){
			throw new NotFoundException(__('Invalid event'));
			}
		$event = $this->Event->findById($id);
        if(!$event){
        	throw new NotFoundException(__("Invalid Event"));
        	}
        $uid = $this->Auth->user('id');
        $eventreq = $this->Event->Requestinvite->findByEventId($id);
        $userreq = $this->Event->Requestinvite->findByUserId($uid);
		if($this->request->is('post')){
			if(!$eventreq or !$userreq){
				$this->Event->Requestinvite->create();
				$this->Event->Requestinvite->set('user_id',$uid);
				$this->Event->Requestinvite->set('event_id',$id);
				$this->Event->Requestinvite->save($this->request->data);
				$this->Session->setFlash( __("The request has been sent"));
				$this->redirect( array('action' => 'index'));
			}else {
				$this->Session->setFlash( __("Already requested %s"));
				$this->redirect( array('action' => 'index'));
				}
		}		
		

	     
	}
    
    /**
     * View all events
     */
    public function index() {
        $events = $this->Event->find('all');
        $this->set('events',$events);
    }
	
    
    /**
     * View event details
     * @param int $id
     * @throws NotFoundException
     * #!todo: use users_events to display a username instead of ID
     */
    public function view($id = null){
        if(!$id){
            throw new NotFoundException(__("Invalid Event"));
        }
        $event = $this->Event->findById($id);
        if(!$event){
        	throw new NotFoundException(__("Invalid Event"));
        }
        $this->set('event', $event);
    }
    
    
    /**
     * Create a new event 
     */
    public function create(){
    	if ($this->request->is('post')) {
			$this->Event->create();
			$this->Event->set('host', $this->Auth->user('id'));
			$this->Event->save($this->request->data);
			
			if (!$this->Event->exists()) {
				throw new NotFoundException(__('Invalid event'));
			}
			
			//Add record to cuisines_events table as well
			$cuisine_id = $this->request->data['Event']['cuisine'] + 0;			
 			$this->Event->CuisinesEvent->create();
			$this->Event->CuisinesEvent->save(array(
								'event_id'=> $this->Event->id,
							 	'cuisine_id' => $cuisine_id));
							
			$this->Session->setFlash( __("The event has been created"));			
			$this->redirect( array('action' => 'index'));
    	}
    	
    }
    
    
	/**
	 * Edit event
	 * 
	 * @param int $id
	 * @throws NotFoundException
	 */
    public function edit($id = null){
    	if (!$id) {
    		throw new NotFoundException(__('Invalid event'));
    	}
    	
    	$event = $this->Event->findById($id);
    	if (!$event) {
    		throw new NotFoundException(__('Invalid event'));
    	}
    	
    	if ($this->request->is(array('post', 'put'))) {
    		$this->Event->id = $id;
    		if ($this->Event->save($this->request->data)) {
    			$this->Session->setFlash(__('The event has been updated'));
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Session->setFlash(__('Unable to update the event'));
    	}
    	
    	if (!$this->request->data) {
    		$this->request->data = $event;
    	} 
    }
    
    
    /**
     * Delete event
     * 
     * @param int $id
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     */
	public function delete($id) {
		if(!$id){
			throw new NotFoundException(__('Invalid event'));
		}
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }
	
	    if ($this->Event->delete($id)) {
	        $this->Session->setFlash(__('The event with id: %s has been deleted', h($id)));
	        return $this->redirect(array('action' => 'index'));
	    }
	}
    
    
}
