<?php

class EventsController extends AppController {
    public $helpers = array('Html', 'Form', 'Paginator');
	
    /**
     * #!todo: 
     * Add paginator to index
     * Add function doc
     */
    
    /**
     * View all events
     */
    public function index() {
        $this->set('events', $this->Event->find('all'));
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
?>
