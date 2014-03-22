<?php
App::uses('AppController', 'Controller');
/**
 * AccessoriesPhotos Controller
 *
 * @property AccessoriesPhoto $AccessoriesPhoto
 * @property PaginatorComponent $Paginator
 */
class AccessoriesPhotosController extends AppController {

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
		$this->AccessoriesPhoto->recursive = 0;
		$this->set('accessoriesPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AccessoriesPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid accessories photo'));
		}
		$options = array('conditions' => array('AccessoriesPhoto.' . $this->AccessoriesPhoto->primaryKey => $id));
		$this->set('accessoriesPhoto', $this->AccessoriesPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AccessoriesPhoto->create();
			if ($this->AccessoriesPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The accessories photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessories photo could not be saved. Please, try again.'));
			}
		}
		$accessories = $this->AccessoriesPhoto->Accessory->find('list');
		$photos = $this->AccessoriesPhoto->Photo->find('list');
		$users = $this->AccessoriesPhoto->User->find('list');
		$this->set(compact('accessories', 'photos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AccessoriesPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid accessories photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AccessoriesPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The accessories photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessories photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AccessoriesPhoto.' . $this->AccessoriesPhoto->primaryKey => $id));
			$this->request->data = $this->AccessoriesPhoto->find('first', $options);
		}
		$accessories = $this->AccessoriesPhoto->Accessory->find('list');
		$photos = $this->AccessoriesPhoto->Photo->find('list');
		$users = $this->AccessoriesPhoto->User->find('list');
		$this->set(compact('accessories', 'photos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AccessoriesPhoto->id = $id;
		if (!$this->AccessoriesPhoto->exists()) {
			throw new NotFoundException(__('Invalid accessories photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AccessoriesPhoto->delete()) {
			$this->Session->setFlash(__('The accessories photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The accessories photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
