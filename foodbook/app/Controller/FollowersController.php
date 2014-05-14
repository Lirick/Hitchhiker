<?php
App::uses('AppController', 'Controller');
/**
 * Followers Controller
 *
 * @property Follower $Follower
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FollowersController extends AppController {

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
		if (!$this->Follower->exists($id)) {
			throw new NotFoundException(__('Invalid follower'));
		}
		$options = array('conditions' => array('Follower.' . $this->Follower->primaryKey => $id));
		$this->set('follower', $this->Follower->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->Follower->create();
		$this->Follower->uid = $id;
		$this->Follower->follower_id = $this->Auth->user('id');
		if ($this->Follower->save($this->Follower)) {
			$this->Session->setFlash(__('You now follow this person.'));
			return $this->redirect(array('controller' => 'users', 'action' => 'view',$id));
		} else {
			$this->Session->setFlash(__('The follower could not be saved. Please, try again.'));
		}
	}

	public function follows($id = null) {
		return 1 <= $this->Follower->find('count', array('conditions' => array('Follower.uid' => $id, 'Follower.follower_id' => $this->Auth->user('id'))));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		//$this->Follower->create();
		$this->Follower->uid = $id;
		$this->Follower->follower_id = $this->Auth->user('id');
		$follower = $this->Follower->find('first', array('conditions' => array('Follower.uid' => $id, 'Follower.follower_id' => $this->Auth->user('id'))));
		debug($follower);
		//this->request->onlyAllow('post', 'delete');
		if ($this->Follower->delete($follower['Follower']['id'])) {
			$this->Session->setFlash(__('You no longer follow this person'));
		} else {
			$this->Session->setFlash(__('Failed to unfollow the person. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'users', 'action' => 'view',$id));
	}}
