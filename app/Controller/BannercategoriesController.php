<?php
App::uses('AppController', 'Controller');
/**
 * Bannercategories Controller
 *
 * @property Bannercategory $Bannercategory
 * @property PaginatorComponent $Paginator
 */
class BannercategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Bannercategory->recursive = 0;
		$this->set('bannercategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bannercategory->exists($id)) {
			throw new NotFoundException(__('Invalid bannercategory'));
		}
		$options = array('conditions' => array('Bannercategory.' . $this->Bannercategory->primaryKey => $id));
		$this->set('bannercategory', $this->Bannercategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bannercategory->create();
			if ($this->Bannercategory->save($this->request->data)) {
				$this->Session->setFlash(__('The bannercategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bannercategory could not be saved. Please, try again.'));
			}
		}
		$users = $this->Bannercategory->User->find('list');
		$banners = $this->Bannercategory->Banner->find('list');
		$this->set(compact('users', 'banners'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bannercategory->exists($id)) {
			throw new NotFoundException(__('Invalid bannercategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bannercategory->save($this->request->data)) {
				$this->Session->setFlash(__('The bannercategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bannercategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bannercategory.' . $this->Bannercategory->primaryKey => $id));
			$this->request->data = $this->Bannercategory->find('first', $options);
		}
		$users = $this->Bannercategory->User->find('list');
		$banners = $this->Bannercategory->Banner->find('list');
		$this->set(compact('users', 'banners'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bannercategory->id = $id;
		if (!$this->Bannercategory->exists()) {
			throw new NotFoundException(__('Invalid bannercategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bannercategory->delete()) {
			$this->Session->setFlash(__('The bannercategory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bannercategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
