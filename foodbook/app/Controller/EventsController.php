<?php

class EventsController extends AppController {
    public $helpers = array('Html', 'Form');
    
    public $components = array('Paginator');

    /**
     * Non-logged in user can't access all the actions 
     * @see Controller::beforeFilter()
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view');       
    }
        
    
	/**
	 * Show all events of the logged in user
	 */
	public function myevents() {
	    $events = $this->Event->findAllByUserId($this->Auth->user('id'));
	    $this->set('events',$events);
    }
    


    /**
     * Send request to get an invite
     *
     * @param int $id
     * @throws NotFoundException
     */
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
    			$this->redirect($this->referer());
    			//$this->redirect( array('action' => 'index'));
    		}else {
    			$this->Session->setFlash( __("Already requested %s"));
    			//$this->redirect( array('action' => 'index'));
    			$this->redirect($this->referer());
    		}
    	}
    }
    
    
    /**
     * Accept the user's request
     * 
     * @param int $id
     * @param int $eid
     * @throws NotFoundException
     */
    public function acceptuser($id, $eid) {
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
        

    /**
     * Helper function
     * Returns a list of user ids of those users 
     * who are waiting for their requests to be accepted
     * @param int $event_id
     * @return array
     */
    private function get_pending_requests($event_id){
    	$event = $this->Event->findById($event_id);
    	$users = $event['RequestInviteToEvent'];
    	return array_map(
    		function($user){
    			return $user['id'];
    		}, 
    		$users);    	    	
    }
    
    
    /**
     * @param int $event_id event id
     */
    public function requestusers($event_id) { 
    	$event = $this->Event->findById($event_id);
    	$users = $event['RequestInviteToEvent'];
    	$notansweredusers = array();
    	foreach ($users as $user){
    		if(!$this->Event->Goingto->findByUserIdAndEventId($user['id'], $event_id)){
    			$notansweredusers[] = $user;
    		}

    	}
    	$this->set('event', $event['Event']);
    	$this->set('requestusers', $notansweredusers);
    }
    

    /**
     * Helper function
     * Returns a list of user ids of those users 
     * who are waiting for their invites to be accepted
     * @param int $event_id
     * @return array
     */
    private function get_pending_invites($event_id){
		$event = $this->Event->findById($event_id);
    	$users = $event['InvitedToEvent'];
    	return array_map(
    		function($user){
    			return $user['id'];
    		}, 
    		$users); 
    }


    /**
     * @param int $event_id event id
     */
    public function inviteusers($event_id) {
    	$event = $this->Event->findById($event_id);
    	$users = $event['InvitedToEvent'];
    	$notansweredusers = array();    	
    	foreach ($users as $user){
    		if(!$this->Event->Goingto->findByUserIdAndEventId($user['id'], $event_id)){
    			$notansweredusers[] = $user;
    		}
    	}
    	$this->set('event', $event['Event']);
    	$this->set('invitesusers', $notansweredusers);
    }
        
    
	/**
	 * Helper function
	 * Returns a list of user ids who are going to the event
	 * 
	 * @param int $event_id event id
	 */
	private function get_going_users($event_id){
    	$event = $this->Event->findById($event_id);
    	$users = $event['GoingToEvent'];
    	
    	return array_map(
    			function($user){
    		return $user['id'];
    	},
    	$users);
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
     
     
    

    /**
     * View all events
     */
    public function index() {
        $data = $this->Paginator->paginate();        
        $this->set('events', $data);
        //$this->set('authUser', $this->Auth->user()); No need, since can user AuthComponent::user() globally accessible
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
        $id = $id + 0; //cast to int
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
        	$event['Comment'][$key]['picture'] = $lookup->field('picture');
        }


        $this->set('event', $event);
        $this->set('isowner',$isowner);
        
        $this->set('pending_requests',$this->get_pending_requests($id));
        $this->set('pending_invites',$this->get_pending_invites($id));
		$this->set('going_users', $this->get_going_users($id));
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
    	
    	//only the host/author of the event can modify it    	
    	if( $event['Event']['user_id'] != $this->Auth->user('id') ){
    		throw new UnauthorizedException(__('You are not allowed to modify the event'));
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

		$event = $this->Event->findById($id);
		if (!$event) {
			throw new NotFoundException(__('Invalid event'));
		}
		
		if( $event['Event']['user_id'] != $this->Auth->user('id') ){
			throw new UnauthorizedException(__('You are not allowed to delete the event'));
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
