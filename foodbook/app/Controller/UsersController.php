<?php

 App::import('Controller', 'Followers');
 App::import('Controller', 'Endorsers');

class UsersController extends AppController {

	public $helpers = array('Html', 'Form');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('signup', 'logout', 'login','index','view','search');
	}


	public function login() {
        $this->layout = 'ajax';
        $this->autoLayout = false;
        $this->autoRender = false;

        $response = array('success' => false);

        if (!empty($this->data['User']['username']) && !empty($this->data['User']['password'])) {
            if ($this->Auth->login()) {
                $response['success'] = true;
                $response['data'] = "Login successfully!";
            } else {
                $response['data'] = 'Username or password is incorrect.';
                $response['code'] = 0;
            }
        } else {
            $response['data'] = 'Username or password is empty.';
            $response['code'] = -1;
        }

        $this->header('Content-Type: application/json');
        echo json_encode($response);
        return;
        /*
		if ($this->request->is('post')) {
		    if ($this->Auth->login()) {
		        return $this->redirect($this->Auth->redirectUrl());
		    }
		    $this->Session->setFlash(__('Invalid username or password, try again'));
		}
		else if ($this->Auth->user())
		{
			return $this->redirect($this->Auth->redirectUrl());
		}*/
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

	private function readData($id = null){
		$lookup = ClassRegistry::init('users');
		$lookup->id = $id;
		
		$this->set('username', $lookup->field('username'));
		$this->set('email', $lookup->field('email'));
		$this->set('phone', $lookup->field('phone'));  
		$this->set('picture', "users/" .$lookup->field('picture')); 
		$this->set('id', $id);
		$this->set('regid', $this->Auth->user('id'));
		
		$allinfo = $this->User->findById($id);
		$followedby = $allinfo['FollowedBy'];
		$this->set('followedby', $followedby);	
	}

    public function view($id = null) {
        if ($id == null) {
            $id = $this->Auth->user('id');
        }
        $this->User->id = $id;
    	$Followers = new FollowersController;
		$Followers->constructClasses();
		$Endorsers= new EndorsersController;
		$Endorsers->constructClasses();
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('follows', $Followers->follows($id));
        $this->set('nrfollows', $Followers->count($id));
        $this->set('endorses', $Endorsers->endorses($id));
        $this->set('nrendorses', $Endorsers->count($id));
        $this->readData($id);
        
        $this->User->Userrating->virtualFields['Rating'] = 0;
        
        $ratings = $this->User->Userrating->query(
        "SELECT
        	userto, AVG(rating) as Userrating__Rating
        FROM
        	userratings as Userrating
        WHERE 
        	userto =".$id,"
        AS
        	Userrating
        GROUP BY
        	userto
        "
        ); 
        $this->set('ratings',$ratings);
        
                
    }
    
    

    public function signup() {
    	// Don't allow sign ups when user is logged in
    	if ($this->Auth->user())
		{
			return $this->redirect($this->Auth->redirectUrl());
		}
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been created'));
                if ($this->Auth->login()) {
		        	return $this->redirect($this->Auth->redirectUrl());
		    	}
                return $this->redirect(array('controller' => 'starts', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __('Invalid user details')
            );
        }
    }

    public function edit() {
    	$id = $this->Auth->user('id');
        $this->User->id = $id;
        if (!$this->User->exists()) 
        {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->readData($id);
        if ($this->request->is('post')) {
        	debug($this->request->data);
        	if (isset($this->request->data['User']['Choose file']))
        	{
        		$ending = pathinfo($this->request->data['User']['Choose file']['name'], PATHINFO_EXTENSION);
        		$filename = APP . "webroot/img/users/" . $id . "." . $ending;
        		$this->User->picture = $id . "." . $ending;
        		if (move_uploaded_file($this->request->data['User']['Choose file']['tmp_name'],$filename))
        		{
        			if ($this->User->save($this->User))
        			{	
		    			$this->Session->setFlash(__('The picture has been uploaded'));
		    		 	$this->redirect(array('action' => 'edit'));
		    		}
		    		else
        			{
        				$this->Session->setFlash(__('The picture failed to upload'));
        			}
        		}
        		else
        		{
        			$this->Session->setFlash(__('The picture failed to upload'));
        		}
        	}
        	
            if ($this->User->save($this->request->data)) 
            {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'view'));
            }
	        else
	        {
	        	$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } 
    }
    
    public function home() {
    	$id = $this->Auth->user('id');
		$this->User->id = $id;
		if (!$this->User->exists()) {
		    throw new NotFoundException(__('Invalid user'));
		}
		$this->readData($id);
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
    
    public function search() {
		if ($this->request->is('post')) {
			$this->set('searched', true);
			$search = $this->request->data['User']['Search'];
			$this->set('username', $search);
			$lookup = ClassRegistry::init('users');
			$cond=array('OR'=>array("users.username LIKE '%$search%'") );
			$this->set('found', $lookup->find('list', array('conditions' => $cond, 'fields' => array('username', 'id'))));
		
		}
		else {
			$this->set('searched', False);
		}
	}
}

	
