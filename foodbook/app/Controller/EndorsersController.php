<?php
App::uses('AppController', 'Controller');
/**
 * Endorses Controller
 *
 * @property Endorser $Endorser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EndorsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

        $this->layout = 'ajax';
        $this->autoLayout = false;

		$options = array('conditions' => array('Endorser.uid'  => $id));
		$endorser = $this->Endorser->find('all', $options);

		$this->set('endorsers',$endorser);
	}

	public function count ($id = null) {
		$options = array('conditions' => array('Endorser.uid'  => $id));
		return $this->Endorser->find('count', $options);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->Endorser->create();
		$this->Endorser->uid = $id;
		$this->Endorser->endorser_id = $this->Auth->user('id');
		if ($this->endorses($id) || $id == $this->Auth->user('id'))
			return null;
		if ($this->Endorser->save($this->Endorser)) {
			$this->Session->setFlash(__('You now endorse this person.'));
			return $this->redirect(array('controller' => 'users', 'action' => 'view',$id));
		} else {
			$this->Session->setFlash(__('The Endorser could not be saved. Please, try again.'));
		}
	}

	public function endorses($id = null) {
		return 1 <= $this->Endorser->find('count', array('conditions' => array('Endorser.uid' => $id, 'Endorser.endorser_id' => $this->Auth->user('id'))));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		//$this->Endorser->create();
		$this->Endorser->uid = $id;
		$this->Endorser->endorser_id = $this->Auth->user('id');
		$Endorser = $this->Endorser->find('first', array('conditions' => array('Endorser.uid' => $id, 'Endorser.endorser_id' => $this->Auth->user('id'))));
		//this->request->onlyAllow('post', 'delete');
		if ($this->Endorser->delete($Endorser['Endorser']['id'])) {
			$this->Session->setFlash(__('You no longer endorse this person'));
		} else {
			$this->Session->setFlash(__('Failed to unendorse the person. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'users', 'action' => 'view',$id));
	}}
