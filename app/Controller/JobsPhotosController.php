<?php
App::uses('AppController', 'Controller');
/**
 * JobsPhotos Controller
 *
 * @property JobsPhoto $JobsPhoto
 * @property PaginatorComponent $Paginator
 */
class JobsPhotosController extends AppController {

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
		$this->JobsPhoto->recursive = 0;
		$this->set('jobsPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JobsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid jobs photo'));
		}
		$options = array('conditions' => array('JobsPhoto.' . $this->JobsPhoto->primaryKey => $id));
		$this->set('jobsPhoto', $this->JobsPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JobsPhoto->create();
			if ($this->JobsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs photo could not be saved. Please, try again.'));
			}
		}
		$castings = $this->JobsPhoto->Casting->find('list');
		$photos = $this->JobsPhoto->Photo->find('list');
		$users = $this->JobsPhoto->User->find('list');
		$this->set(compact('castings', 'photos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->JobsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid jobs photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->JobsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('JobsPhoto.' . $this->JobsPhoto->primaryKey => $id));
			$this->request->data = $this->JobsPhoto->find('first', $options);
		}
		$castings = $this->JobsPhoto->Casting->find('list');
		$photos = $this->JobsPhoto->Photo->find('list');
		$users = $this->JobsPhoto->User->find('list');
		$this->set(compact('castings', 'photos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->JobsPhoto->id = $id;
		if (!$this->JobsPhoto->exists()) {
			throw new NotFoundException(__('Invalid jobs photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobsPhoto->delete()) {
			$this->Session->setFlash(__('The jobs photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The jobs photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
