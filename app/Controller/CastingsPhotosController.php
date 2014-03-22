<?php
App::uses('AppController', 'Controller');
/**
 * CastingsPhotos Controller
 *
 * @property CastingsPhoto $CastingsPhoto
 * @property PaginatorComponent $Paginator
 */
class CastingsPhotosController extends AppController {

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
		$this->CastingsPhoto->recursive = 0;
		$this->set('castingsPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CastingsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid castings photo'));
		}
		$options = array('conditions' => array('CastingsPhoto.' . $this->CastingsPhoto->primaryKey => $id));
		$this->set('castingsPhoto', $this->CastingsPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CastingsPhoto->create();
			if ($this->CastingsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The castings photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The castings photo could not be saved. Please, try again.'));
			}
		}
		$jobs = $this->CastingsPhoto->Job->find('list');
		$photos = $this->CastingsPhoto->Photo->find('list');
		$users = $this->CastingsPhoto->User->find('list');
		$this->set(compact('jobs', 'photos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CastingsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid castings photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CastingsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The castings photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The castings photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CastingsPhoto.' . $this->CastingsPhoto->primaryKey => $id));
			$this->request->data = $this->CastingsPhoto->find('first', $options);
		}
		$jobs = $this->CastingsPhoto->Job->find('list');
		$photos = $this->CastingsPhoto->Photo->find('list');
		$users = $this->CastingsPhoto->User->find('list');
		$this->set(compact('jobs', 'photos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CastingsPhoto->id = $id;
		if (!$this->CastingsPhoto->exists()) {
			throw new NotFoundException(__('Invalid castings photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CastingsPhoto->delete()) {
			$this->Session->setFlash(__('The castings photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The castings photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
