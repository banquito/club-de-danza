<?php
App::uses('AppController', 'Controller');
/**
 * AuditionsPhotos Controller
 *
 * @property AuditionsPhoto $AuditionsPhoto
 * @property PaginatorComponent $Paginator
 */
class AuditionsPhotosController extends AppController {

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
		$this->AuditionsPhoto->recursive = 0;
		$this->set('auditionsPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AuditionsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid auditions photo'));
		}
		$options = array('conditions' => array('AuditionsPhoto.' . $this->AuditionsPhoto->primaryKey => $id));
		$this->set('auditionsPhoto', $this->AuditionsPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AuditionsPhoto->create();
			if ($this->AuditionsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The auditions photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auditions photo could not be saved. Please, try again.'));
			}
		}
		$auditions = $this->AuditionsPhoto->Audition->find('list');
		$photos = $this->AuditionsPhoto->Photo->find('list');
		$users = $this->AuditionsPhoto->User->find('list');
		$this->set(compact('auditions', 'photos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AuditionsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid auditions photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AuditionsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The auditions photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auditions photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AuditionsPhoto.' . $this->AuditionsPhoto->primaryKey => $id));
			$this->request->data = $this->AuditionsPhoto->find('first', $options);
		}
		$auditions = $this->AuditionsPhoto->Audition->find('list');
		$photos = $this->AuditionsPhoto->Photo->find('list');
		$users = $this->AuditionsPhoto->User->find('list');
		$this->set(compact('auditions', 'photos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AuditionsPhoto->id = $id;
		if (!$this->AuditionsPhoto->exists()) {
			throw new NotFoundException(__('Invalid auditions photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AuditionsPhoto->delete()) {
			$this->Session->setFlash(__('The auditions photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The auditions photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
