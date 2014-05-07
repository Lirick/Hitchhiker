<?php
App::uses('AppController', 'Controller');
/**
 * Invites Controller
 *
 * @property Invite $Invite
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InvitesController extends AppController {

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
		$this->Invite->recursive = 0;
		$this->set('invites', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Invite->exists($id)) {
			throw new NotFoundException(__('Invalid invite'));
		}
		$options = array('conditions' => array('Invite.' . $this->Invite->primaryKey => $id));
		$this->set('invite', $this->Invite->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Invite->create();
			if ($this->Invite->save($this->request->data)) {
				$this->Session->setFlash(__('The invite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invite could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Invite->exists($id)) {
			throw new NotFoundException(__('Invalid invite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Invite->save($this->request->data)) {
				$this->Session->setFlash(__('The invite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Invite.' . $this->Invite->primaryKey => $id));
			$this->request->data = $this->Invite->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Invite->id = $id;
		if (!$this->Invite->exists()) {
			throw new NotFoundException(__('Invalid invite'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Invite->delete()) {
			$this->Session->setFlash(__('The invite has been deleted.'));
		} else {
			$this->Session->setFlash(__('The invite could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
