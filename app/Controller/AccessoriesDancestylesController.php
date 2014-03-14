<?php
App::uses('AppController', 'Controller');
/**
 * AccessoriesDancestyles Controller
 *
 * @property AccessoriesDancestyle $AccessoriesDancestyle
 * @property PaginatorComponent $Paginator
 */
class AccessoriesDancestylesController extends AppController {

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
		$this->AccessoriesDancestyle->recursive = 0;
		$this->set('accessoriesDancestyles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AccessoriesDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid accessories dancestyle'));
		}
		$options = array('conditions' => array('AccessoriesDancestyle.' . $this->AccessoriesDancestyle->primaryKey => $id));
		$this->set('accessoriesDancestyle', $this->AccessoriesDancestyle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AccessoriesDancestyle->create();
			if ($this->AccessoriesDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The accessories dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessories dancestyle could not be saved. Please, try again.'));
			}
		}
		$accessories = $this->AccessoriesDancestyle->Accessory->find('list');
		$dancestyles = $this->AccessoriesDancestyle->Dancestyle->find('list');
		$users = $this->AccessoriesDancestyle->User->find('list');
		$this->set(compact('accessories', 'dancestyles', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AccessoriesDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid accessories dancestyle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AccessoriesDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The accessories dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessories dancestyle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AccessoriesDancestyle.' . $this->AccessoriesDancestyle->primaryKey => $id));
			$this->request->data = $this->AccessoriesDancestyle->find('first', $options);
		}
		$accessories = $this->AccessoriesDancestyle->Accessory->find('list');
		$dancestyles = $this->AccessoriesDancestyle->Dancestyle->find('list');
		$users = $this->AccessoriesDancestyle->User->find('list');
		$this->set(compact('accessories', 'dancestyles', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AccessoriesDancestyle->id = $id;
		if (!$this->AccessoriesDancestyle->exists()) {
			throw new NotFoundException(__('Invalid accessories dancestyle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AccessoriesDancestyle->delete()) {
			$this->Session->setFlash(__('The accessories dancestyle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The accessories dancestyle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
