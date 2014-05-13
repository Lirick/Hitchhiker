<?php
App::uses('AppController', 'Controller');
/**
 * Invitedtos Controller
 *
 * @property Invitedto $Invitedto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InvitedtosController extends AppController {



/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Session');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Invitedto->recursive = 0;
		$this->set('invitedtos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Invitedto->exists($id)) {
			throw new NotFoundException(__('Invalid invitedto'));
		}
		$options = array('conditions' => array('Invitedto.' . $this->Invitedto->primaryKey => $id));
		$this->set('invitedto', $this->Invitedto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Invitedto->create();
			if ($this->Invitedto->save($this->request->data)) {
				$this->Session->setFlash(__('The invitedto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invitedto could not be saved. Please, try again.'));
			}
		}
		$users = $this->Invitedto->User->find('list');
		$events = $this->Invitedto->Event->find('list');
		$this->set(compact('users', 'events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Invitedto->exists($id)) {
			throw new NotFoundException(__('Invalid invitedto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Invitedto->save($this->request->data)) {
				$this->Session->setFlash(__('The invitedto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invitedto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Invitedto.' . $this->Invitedto->primaryKey => $id));
			$this->request->data = $this->Invitedto->find('first', $options);
		}
		$users = $this->Invitedto->User->find('list');
		$events = $this->Invitedto->Event->find('list');
		$this->set(compact('users', 'events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Invitedto->id = $id;
		if (!$this->Invitedto->exists()) {
			throw new NotFoundException(__('Invalid invitedto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Invitedto->delete()) {
			$this->Session->setFlash(__('The invitedto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The invitedto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
