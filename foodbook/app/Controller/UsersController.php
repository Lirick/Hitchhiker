// app/Controller/UsersController.php
<?php
class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('signup', 'logout', 'login');
	}

	public function login() {
		if ($this->request->is('post')) {
		    if ($this->Auth->login()) {
		        return $this->redirect($this->Auth->redirect());
		    }
		    $this->Session->setFlash(__('Invalid username or password, try again'));
		}
		else if ($this->Auth->user())
		{
			return $this->redirect($this->Auth->redirect());
		}
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
	}

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->readData($id);
    }

    public function signup() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been created'));
                if ($this->Auth->login()) {
		        	return $this->redirect($this->Auth->redirect());
		    	}
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('Invalid user details')
            );
        }
    }

    public function edit() {
    	$id = $this->Auth->user('id');
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'home'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
			$this->readData($id);
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
}
