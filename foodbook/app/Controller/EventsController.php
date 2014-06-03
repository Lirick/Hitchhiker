<?php

App::import('Controller', 'Eventpics');

class EventsController extends AppController {
	public $helpers = array('Html', 'Form');

	public $components = array('Paginator');

	/**
	 * Non-logged in user can't access all the actions
	 * @see Controller::beforeFilter()
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','view', 'search', 'get_locations', 'search_by_location');
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
		$cuisines = $this->Event->Cuisine->find('all');
		$this->set('cuisines', $cuisines);
		$this->set('events', $data);
		$this->render('search');
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
   		$Eventpics = new EventpicsController;
		$Eventpics->constructClasses();
		$this->set('picture', $Eventpics->findall($id));
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

        $Eventpics = new EventpicsController;
        $Eventpics->constructClasses();
        $this->set('picture', $Eventpics->findall($id));
    }
    
    
    /**		
     * Create a new event 
     */
    public function create(){
    	$this->set('searched', false);
    	if ($this->request->is('post')) {    	
			$this->Event->create();
			$req = $this->request->data;
				
			//Create the location
			$this->Event->Location->create();
			$addr = $req['event-address'];
			$this->Event->Location->save(array(
					'display_address' => $addr['display_address'],
					'lat' => $addr['lat'],
					'lng' => $addr['lng'],
					'city' => $addr['city'],
					'country' => $addr['country']
			));
			$location_id = $this->Event->Location->id;
				

			//#!todo: should we check: if event wasn't added - remove a record from locations as well?
				
			// Create Event

			//mysql injections!!!!!
			$this->Event->set('user_id', $this->Auth->user('id'));
			$this->Event->set('ename', $req['event-topic']);
			$this->Event->set('location_id', $location_id);
				
			// write scheduled time in datetime sql format
			$d = DateTime::createFromFormat("m/d/Y g:i A", $req['event-schedule']);
			$event_schedule = $d->format('Y-m-d H:i:s');
				
			$this->Event->set('date', $event_schedule);
			$this->Event->set('text', $req['event-description']);
			$this->Event->set('min_guests', 0+$req['event-min-guests']);
			$this->Event->set('max_guests', 0+$req['event-max-guests']);
			$this->Event->set('price_per_guest', 0+$req['event-price']);
				
			$this->Event->save();
				
			 
			if (!$this->Event->exists()) {
				throw new NotFoundException(__('Invalid event'));
			}

				
			//Add record to cuisines_events table as well
			$cuisine_id = $req['event-cuisine'] + 0;
			$this->Event->CuisinesEvent->create();
			$this->Event->CuisinesEvent->save(array(
					'event_id'=> $this->Event->id,
					'cuisine_id' => $cuisine_id));
				
			//$this->Session->setFlash( __("The event has been created"));
			//$this->redirect( array('action' => 'search'));
		} else{
			$cuisines = $this->Event->Cuisine->find('all');
			$this->set('cuisines', $cuisines);
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
		$this->set('eid', $id);
		$Eventpics = new EventpicsController;
		$Eventpics->constructClasses();
		$this->set('picture', $Eventpics->findall($id));

    	$event = $this->Event->findById($id);

        $location_id = $event['Event']['location_id'];

        $loc = $this->Event->Location->find('first', array(
            'conditions' => array( 'Location.id' => $location_id)));

        $this->set('location', $loc);
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
    			return $this->redirect(array('action' => 'view',$id));
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
	        return $this->redirect(array('controller' => 'starts', 'action' => 'index'));
	    }

	}

	
	public function search() {
		if($this->request->is('post')){
			$req = $this->request->data['Event'];
			$settings = array();
			
			// Search events by name			
			if( isset($req['ename']) && trim($req['ename']) !== '' ){
				$settings['conditions'][] = array("Event.ename LIKE" => "%".trim( $req['ename'] )."%");				
			}
			
			// Search events from the specific date
			$dateFrom = (isset($req['date-from']) && trim($req['date-from']) !== '') ? trim($req['date-from']) : null;
			if( $dateFrom ){
				$d = DateTime::createFromFormat("m/d/Y g:i A", $dateFrom);
				$res = $d->format('Y-m-d H:i:s');
				$settings['conditions'][] = array("Event.date > " => $res);
			}

			// Search events until the specific date
			$dateTo = (isset($req['date-to']) && trim($req['date-to']) !== '') ? trim($req['date-to']) : null;
			if( $dateTo ){
				$d = DateTime::createFromFormat("m/d/Y g:i A", $dateTo);
				$res = $d->format('Y-m-d H:i:s');
				$settings['conditions'][] = array("Event.date <= " => $res);				
			}

			// Search events by cuisine type
			$cuisine = isset($req['cuisine']) ? $req['cuisine'] + 0 : null;
			if( $cuisine ){				
				$settings['conditions'][] = array('c.id' => $cuisine);
				$settings['joins'] = array(
						array(
								'table' => 'cuisines_events',
								'alias' => 'ce',
								'type' => 'INNER',
								'conditions' => array('ce.event_id = Event.id')
						),
						array(
								'table' => 'cuisines',
								'alias' => 'c',
								'type' => 'INNER',
								'conditions' => array('c.id = ce.cuisine_id')
						));
			}

			// Sort events by price			
			if( isset($req['price']) ) {
				$opt = array('low' => 'asc', 'high' => 'desc');
				$sort = $opt[ $req['price'] ] ? $opt[ $req['price'] ] : 'low';
				$settings['order'] = 'price_per_guest '.$sort;
			}
			
			if( isset($settings['conditions'])){
				$set = array();
				foreach($settings['conditions'] as $con){
					foreach($con as $key=>$val){
						$set[$key] = $val;
					}					
				}
				$settings['conditions'] = $set;							
			}
			$this->paginate = $settings;
		}	
		
		$data = $this->paginate('Event');		
		$this->paginate = array('limit' => 8);
		$Eventpics = new EventpicsController;
		for($i = 0; $i < count($data); $i++){
			$data[$i]['Event']['picture'] = $Eventpics->getdef($data[$i]['Event']['id']);
		}

		$cuisines = $this->Event->Cuisine->find('all');
		$this->set('cuisines', $cuisines);
		$this->set('events', $data);
	}


	public function searchUsers() {
		$this->layout = 'ajax';
		$this->autoRender = false;

		if ($this->request->is('post')) {
			//print_r($this->request->data);
			//$this->set('searched', true);
			$search = $this->request->data;
			//$this->set('username', $search);
			$lookup = ClassRegistry::init('users');
			$cond = array('OR' => array("users.username LIKE '%$search%'") );
			$found = $lookup->find('list', array('conditions' => $cond, 'fields' => array('username','picture', 'id')));
			//$found = array('data' => 'result');
			$this->header('Content-Type: application/json');
				
			echo json_encode($found);
			return;
		}
		else {
			//$this->set('searched', False);
		}
	}


	/**
	 * Returns a json containing city and country
	 * Used for typeahead search from the start page
	 */
	public function get_locations(){
		$this->autoRender = false;
		$this->header('Content-Type: application/json');

		$result = $this->Event->Location->query('SELECT DISTINCT country, city FROM locations');
		$found = array();
		foreach($result as $val){
			$found[] = $val['locations']['city'].', '.$val['locations']['country'];
		}
		echo json_encode($found);
		return;
	}


	/**
	 * Search events by Location
	 * Used in the start page
	 */
	public function search_by_location(){
		if ($this->request->is('post')) {
			$cc = explode(',', $this->request->data['location-input']);
				
			//display all events if no location specified
			if(!$cc || !$cc[0] || !$cc[1]){
				$this->redirect(array('action' => 'search'));
				return;
			}
			$conditions = array("Location.city LIKE" => "%".trim($cc[0])."%", "Location.country LIKE" => "%".trim($cc[1])."%");
			$rows = $this->Event->Location->find('all', array(
					'conditions' => $conditions,
					'fields' => array('Location.id')
			));
				
			$location_ids = array();
			foreach($rows as $row){
				$location_ids[] = $row['Location']['id'];
			}
				
			$events = $this->Event->find('all', array(
					'conditions' => array('location_id' => $location_ids ) //e.g. IN (1,2)
			));

			
			$this->Paginator->settings = array('limit' => 8);
			$data = $this->Paginator->paginate();

			$this->set('location_ids', $location_ids);
			$this->set('events', $events);
			$this->render('search');
		}else{
			//if it's a 'get'-request
			$this->redirect(array('action' => 'search'));
		}
	}

}
