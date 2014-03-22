<?php
App::uses('AppController', 'Controller');
/**
 * CallsPhotos Controller
 *
 * @property CallsPhoto $CallsPhoto
 * @property PaginatorComponent $Paginator
 */
class CallsPhotosController extends AppController {

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
		$this->CallsPhoto->recursive = 0;
		$this->set('callsPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CallsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid calls photo'));
		}
		$options = array('conditions' => array('CallsPhoto.' . $this->CallsPhoto->primaryKey => $id));
		$this->set('callsPhoto', $this->CallsPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CallsPhoto->create();
			if ($this->CallsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The calls photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls photo could not be saved. Please, try again.'));
			}
		}
		$calls = $this->CallsPhoto->Call->find('list');
		$photos = $this->CallsPhoto->Photo->find('list');
		$users = $this->CallsPhoto->User->find('list');
		$this->set(compact('calls', 'photos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CallsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid calls photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CallsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The calls photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CallsPhoto.' . $this->CallsPhoto->primaryKey => $id));
			$this->request->data = $this->CallsPhoto->find('first', $options);
		}
		$calls = $this->CallsPhoto->Call->find('list');
		$photos = $this->CallsPhoto->Photo->find('list');
		$users = $this->CallsPhoto->User->find('list');
		$this->set(compact('calls', 'photos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CallsPhoto->id = $id;
		if (!$this->CallsPhoto->exists()) {
			throw new NotFoundException(__('Invalid calls photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CallsPhoto->delete()) {
			$this->Session->setFlash(__('The calls photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calls photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
