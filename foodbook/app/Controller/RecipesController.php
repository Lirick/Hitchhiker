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
	
	public function count ($id = null) {
		$options = array('conditions' => array('Recipe.author'  => $id));
		return $this->Recipe->find('count', $options);
	}
	
	private function getAuthor($id = null)
	{
		$ulookup = ClassRegistry::init('users');
		$ulookup->id = $id;
		return $ulookup->field('username');
	}

    public function search() {
		if ($this->request->is('post')) {
			$this->set('searched', true);
			$search = $this->request->data['Recipe']['Search'];
			$this->set('recipe', $search);
			$lookup = ClassRegistry::init('recipes');
			$cond=array('OR'=>array("recipes.name LIKE '%$search%' OR recipes.tags LIKE '%$search%'") );
			$found = $lookup->find('list', array('conditions' => $cond, 'fields' => array('name','author', 'id')));
			foreach($found as $id => $name)
			{
				foreach($name as $n => $aid)
				{
					$found[$id][$n] = $this->getAuthor($aid);
				}
			}
			
			$this->set('found',$found);
		
		}
		else {
			$this->set('searched', False);
		}
	}


    public function lists($id = null) {
		$lookup = ClassRegistry::init('recipes');
		$cond=array('OR'=>array("recipes.author LIKE '$id'") );
		$found = $lookup->find('list', array('conditions' => $cond, 'fields' => array('name', 'id')));	
		$this->set('found',$found);
		$this->set('user', $this->getAuthor($id));
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
