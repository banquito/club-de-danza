<?php
App::uses('AppController', 'Controller');
/**
 * Practicerooms Controller
 *
 * @property Practiceroom $Practiceroom
 * @property PaginatorComponent $Paginator
 */
class PracticeroomsController extends AppController {

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
		$this->Practiceroom->recursive = 0;
		$this->set('practicerooms', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Practiceroom->exists($id)) {
			throw new NotFoundException(__('Invalid practiceroom'));
		}
		$options = array('conditions' => array('Practiceroom.' . $this->Practiceroom->primaryKey => $id));
		$this->set('practiceroom', $this->Practiceroom->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Practiceroom->create();
			if ($this->Practiceroom->save($this->request->data)) {
				$this->Session->setFlash(__('The practiceroom has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practiceroom could not be saved. Please, try again.'));
			}
		}
		$states = $this->Practiceroom->State->find('list');
		$users = $this->Practiceroom->User->find('list');
		$rooms = $this->Practiceroom->Room->find('list');
		$dancestyles = $this->Practiceroom->Dancestyle->find('list');
		$this->set(compact('states', 'users', 'rooms', 'dancestyles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Practiceroom->exists($id)) {
			throw new NotFoundException(__('Invalid practiceroom'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Practiceroom->save($this->request->data)) {
				$this->Session->setFlash(__('The practiceroom has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practiceroom could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Practiceroom.' . $this->Practiceroom->primaryKey => $id));
			$this->request->data = $this->Practiceroom->find('first', $options);
		}
		$states = $this->Practiceroom->State->find('list');
		$users = $this->Practiceroom->User->find('list');
		$rooms = $this->Practiceroom->Room->find('list');
		$dancestyles = $this->Practiceroom->Dancestyle->find('list');
		$this->set(compact('states', 'users', 'rooms', 'dancestyles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Practiceroom->id = $id;
		if (!$this->Practiceroom->exists()) {
			throw new NotFoundException(__('Invalid practiceroom'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Practiceroom->delete()) {
			$this->Session->setFlash(__('The practiceroom has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practiceroom could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
