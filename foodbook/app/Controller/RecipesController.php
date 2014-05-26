<?php
App::uses('AppController', 'Controller');
/**
 * Recipes Controller
 *
 * @property Recipe $Recipe
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RecipesController extends AppController {

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
		$this->Recipe->recursive = 0;
		$this->set('recipes', $this->Paginator->paginate());
		$this->set('myId', $this->Auth->user('id'));
	}


	private function readData($id = null){
		$rlookup = ClassRegistry::init('recipes');
		$rlookup->id = $id;
		$ulookup = ClassRegistry::init('users');
		$ulookup->id = $rlookup->field('author');
		$this->set('name', $rlookup->field('name'));
		$this->set('ingreds', $rlookup->field('ingreds'));
		$this->set('text', $rlookup->field('text'));  
		$this->set('tags', $rlookup->field('tags')); 
		$this->set('author', $ulookup->field('username'));
		$this->set('ownRec', $rlookup->field('author') == $this->Auth->user('id'));
		return ($rlookup->field('author') == $this->Auth->user('id'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		$this->readData($id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recipe->create();
			$this->request->data['author'] = $this->Auth->user('id');
			$this->request->data['date'] = date("Y-m-d");
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
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
		if (!$this->Recipe->exists($id)) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		if (!$this->readData($id)) {
			throw new NotFoundException(__('You don\'t have permission to edit this recipe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['id'] = $id;
			$this->request->data['author'] = $this->Auth->user('id');
			$this->request->data['date'] = date("Y-m-d");		
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
			$this->request->data = $this->Recipe->find('first', $options);
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
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recipe->delete()) {
			$this->Session->setFlash(__('The recipe has been deleted.'));
		} else {
			$this->Session->setFlash(__('The recipe could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
