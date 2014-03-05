<?php
App::uses('AppController', 'Controller');
/**
 * Dancestyles Controller
 *
 * @property Dancestyle $Dancestyle
 * @property PaginatorComponent $Paginator
 */
class DancestylesController extends AppController {

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
		$this->Dancestyle->recursive = 0;
		$this->set('dancestyles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid dancestyle'));
		}
		$options = array('conditions' => array('Dancestyle.' . $this->Dancestyle->primaryKey => $id));
		$this->set('dancestyle', $this->Dancestyle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dancestyle->create();
			if ($this->Dancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dancestyle could not be saved. Please, try again.'));
			}
		}
		$users = $this->Dancestyle->User->find('list');
		$auditions = $this->Dancestyle->Audition->find('list');
		$this->set(compact('users', 'auditions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid dancestyle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dancestyle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Dancestyle.' . $this->Dancestyle->primaryKey => $id));
			$this->request->data = $this->Dancestyle->find('first', $options);
		}
		$users = $this->Dancestyle->User->find('list');
		$auditions = $this->Dancestyle->Audition->find('list');
		$this->set(compact('users', 'auditions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dancestyle->id = $id;
		if (!$this->Dancestyle->exists()) {
			throw new NotFoundException(__('Invalid dancestyle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Dancestyle->delete()) {
			$this->Session->setFlash(__('The dancestyle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dancestyle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
