<?php
App::uses('AppController', 'Controller');
/**
 * Estudies Controller
 *
 * @property Estudy $Estudy
 * @property PaginatorComponent $Paginator
 */
class EstudiesController extends AppController {

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
		$this->Estudy->recursive = 0;
		$this->set('estudies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Estudy->exists($id)) {
			throw new NotFoundException(__('Invalid estudy'));
		}
		$options = array('conditions' => array('Estudy.' . $this->Estudy->primaryKey => $id));
		$this->set('estudy', $this->Estudy->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Estudy->create();
			if ($this->Estudy->save($this->request->data)) {
				$this->Session->setFlash(__('The estudy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudy could not be saved. Please, try again.'));
			}
		}
		$states = $this->Estudy->State->find('list');
		$users = $this->Estudy->User->find('list');
		$dancestyles = $this->Estudy->Dancestyle->find('list');
		$this->set(compact('states', 'users', 'dancestyles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Estudy->exists($id)) {
			throw new NotFoundException(__('Invalid estudy'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Estudy->save($this->request->data)) {
				$this->Session->setFlash(__('The estudy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Estudy.' . $this->Estudy->primaryKey => $id));
			$this->request->data = $this->Estudy->find('first', $options);
		}
		$states = $this->Estudy->State->find('list');
		$users = $this->Estudy->User->find('list');
		$dancestyles = $this->Estudy->Dancestyle->find('list');
		$this->set(compact('states', 'users', 'dancestyles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Estudy->id = $id;
		if (!$this->Estudy->exists()) {
			throw new NotFoundException(__('Invalid estudy'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Estudy->delete()) {
			$this->Session->setFlash(__('The estudy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The estudy could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
