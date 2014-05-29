<?php

class EventsController extends AppController {
    public $helpers = array('Html', 'Form');
    
    public $components = array('Paginator');

    
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('index','view');
    }
	
    /**
     * #!todo: 
     * Add function doc
     */
     
     
	public function myevents() {
	    $events = $this->Event->findAllByUserId($this->Auth->user('id'));
	    $this->set('events',$events);
    }
    
    
    public function acceptuser($id,$eid) {
    
    	if(!$id){
			throw new NotFoundException(__('Invalid user'));
		}
		if(!$id){
			throw new NotFoundException(__('Invalid event'));
		}
    	$uid = $this->Auth->user('id');
    	if($this->request->is('post')){  	
    		$this->Event->Goingto->create();
    		$this->Event->Goingto->set('user_id',$id);
    		$this->Event->Goingto->set('event_id',$eid);
    		$this->Event->Goingto->save($this->request->data);
        	$this->redirect(array('action' => 'requestusers', $uid));
        }    
    }
    
    
    public function requestusers($id) {
    	$event = $this->Event->findById($id);
    	$justevent = $event['Event'];
    	$uid = $this->Auth->user('id');
    	$this->set('event',$justevent);
        $users = $event['RequestInviteToEvent'];
        foreach ($users as $user){
	        if(!$this->Event->Goingto->findByUserIdAndEventId($user['id'],$justevent['id'])){
		        $notansweredusers[] = $user;
	        }
        }
        
        $this->set('users',$notansweredusers);
    }
    
    
    public function requested($id) {
	    if(!$id){
			throw new NotFoundException(__('Invalid event'));
		}
		$event = $this->Event->findById($id);
		
    	if(!$event){
        	throw new NotFoundException(__("Invalid Event"));
        }
        if($this->request->is('post')){
        	$this->redirect(array('action' => 'requestusers', $id));
		}
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
//      $events = $this->Event->find('first');
//      $this->set('events',$events);
        $data = $this->Paginator->paginate();        
        $this->set('events', $data);        
    }
	
    
    /**
     * View event details
     * @param int $id
     * @throws NotFoundException
     */
    public function view($id = null){    	
        if(!$id){
            throw new NotFoundException(__("Invalid Event"));
        }

        $event = $this->Event->findById($id);

        $isowner = false;
        if ($this->Auth->user('id') == $event['Event']['user_id']) {
            $isowner = true;
        }


        if(!$event){
        	throw new NotFoundException(__("Invalid Event"));
        }
               
        $lookup = ClassRegistry::init('User');        
        foreach($event['Comment'] as $key=>$val){        	        	
        	$lookup->id = $val['user_id'];
        	$event['Comment'][$key]['username'] = $lookup->field('username');        	
        }
		        
        $this->set('event', $event);
        $this->set('isowner',$isowner);
    }
    
    
    /**
     * Create a new event 
     */
    public function create(){
    	$cuisines = $this->Event->Cuisine->find('all');
    	$this->set('cuisines', $cuisines);
    	
    	if ($this->request->is('post')) {
			$this->Event->create();
			$this->Event->set('user_id', $this->Auth->user('id'));
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

        $cuisines = $this->Event->Cuisine->find('all');
        $this->set('cuisines', $cuisines);

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
		if( $this->request->is('get') ) {
			throw new MethodNotAllowedException();
		}
		
		if( !$id ){
			throw new NotFoundException(__('Invalid event'));
		}	    
	
		if( $this->Event->delete($id) ) {
	        $this->Session->setFlash(__('The event with id: %s has been deleted', h($id)));
	        return $this->redirect(array('action' => 'index'));
	    }
	}

    public function search() {
        $this->Paginator->settings = array(
            'limit' => 8
        );
        $data = $this->Paginator->paginate();
        $this->set('events', $data);
    }
}
