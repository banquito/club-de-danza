<?php
App::uses('AppController', 'Controller');
/**
 * JobsDancestyles Controller
 *
 * @property JobsDancestyle $JobsDancestyle
 * @property PaginatorComponent $Paginator
 */
class JobsDancestylesController extends AppController {

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
		$this->JobsDancestyle->recursive = 0;
		$this->set('jobsDancestyles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JobsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid jobs dancestyle'));
		}
		$options = array('conditions' => array('JobsDancestyle.' . $this->JobsDancestyle->primaryKey => $id));
		$this->set('jobsDancestyle', $this->JobsDancestyle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JobsDancestyle->create();
			if ($this->JobsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs dancestyle could not be saved. Please, try again.'));
			}
		}
		$jobs = $this->JobsDancestyle->Job->find('list');
		$dancestyles = $this->JobsDancestyle->Dancestyle->find('list');
		$users = $this->JobsDancestyle->User->find('list');
		$this->set(compact('jobs', 'dancestyles', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->JobsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid jobs dancestyle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->JobsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs dancestyle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('JobsDancestyle.' . $this->JobsDancestyle->primaryKey => $id));
			$this->request->data = $this->JobsDancestyle->find('first', $options);
		}
		$jobs = $this->JobsDancestyle->Job->find('list');
		$dancestyles = $this->JobsDancestyle->Dancestyle->find('list');
		$users = $this->JobsDancestyle->User->find('list');
		$this->set(compact('jobs', 'dancestyles', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->JobsDancestyle->id = $id;
		if (!$this->JobsDancestyle->exists()) {
			throw new NotFoundException(__('Invalid jobs dancestyle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobsDancestyle->delete()) {
			$this->Session->setFlash(__('The jobs dancestyle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The jobs dancestyle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
