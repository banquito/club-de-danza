<?php
App::uses('AppController', 'Controller');
/**
 * CallsDancestyles Controller
 *
 * @property CallsDancestyle $CallsDancestyle
 * @property PaginatorComponent $Paginator
 */
class CallsDancestylesController extends AppController {

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
		$this->CallsDancestyle->recursive = 0;
		$this->set('callsDancestyles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CallsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid calls dancestyle'));
		}
		$options = array('conditions' => array('CallsDancestyle.' . $this->CallsDancestyle->primaryKey => $id));
		$this->set('callsDancestyle', $this->CallsDancestyle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CallsDancestyle->create();
			if ($this->CallsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The calls dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls dancestyle could not be saved. Please, try again.'));
			}
		}
		$calls = $this->CallsDancestyle->Call->find('list');
		$dancestyles = $this->CallsDancestyle->Dancestyle->find('list');
		$users = $this->CallsDancestyle->User->find('list');
		$this->set(compact('calls', 'dancestyles', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CallsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid calls dancestyle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CallsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The calls dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls dancestyle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CallsDancestyle.' . $this->CallsDancestyle->primaryKey => $id));
			$this->request->data = $this->CallsDancestyle->find('first', $options);
		}
		$calls = $this->CallsDancestyle->Call->find('list');
		$dancestyles = $this->CallsDancestyle->Dancestyle->find('list');
		$users = $this->CallsDancestyle->User->find('list');
		$this->set(compact('calls', 'dancestyles', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CallsDancestyle->id = $id;
		if (!$this->CallsDancestyle->exists()) {
			throw new NotFoundException(__('Invalid calls dancestyle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CallsDancestyle->delete()) {
			$this->Session->setFlash(__('The calls dancestyle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calls dancestyle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
