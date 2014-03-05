<?php
App::uses('AppController', 'Controller');
/**
 * AuditionsDancestyles Controller
 *
 * @property AuditionsDancestyle $AuditionsDancestyle
 * @property PaginatorComponent $Paginator
 */
class AuditionsDancestylesController extends AppController {

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
		$this->AuditionsDancestyle->recursive = 0;
		$this->set('auditionsDancestyles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AuditionsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid auditions dancestyle'));
		}
		$options = array('conditions' => array('AuditionsDancestyle.' . $this->AuditionsDancestyle->primaryKey => $id));
		$this->set('auditionsDancestyle', $this->AuditionsDancestyle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AuditionsDancestyle->create();
			if ($this->AuditionsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The auditions dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auditions dancestyle could not be saved. Please, try again.'));
			}
		}
		$auditions = $this->AuditionsDancestyle->Audition->find('list');
		$dancestyles = $this->AuditionsDancestyle->Dancestyle->find('list');
		$users = $this->AuditionsDancestyle->User->find('list');
		$this->set(compact('auditions', 'dancestyles', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AuditionsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid auditions dancestyle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AuditionsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The auditions dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auditions dancestyle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AuditionsDancestyle.' . $this->AuditionsDancestyle->primaryKey => $id));
			$this->request->data = $this->AuditionsDancestyle->find('first', $options);
		}
		$auditions = $this->AuditionsDancestyle->Audition->find('list');
		$dancestyles = $this->AuditionsDancestyle->Dancestyle->find('list');
		$users = $this->AuditionsDancestyle->User->find('list');
		$this->set(compact('auditions', 'dancestyles', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AuditionsDancestyle->id = $id;
		if (!$this->AuditionsDancestyle->exists()) {
			throw new NotFoundException(__('Invalid auditions dancestyle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AuditionsDancestyle->delete()) {
			$this->Session->setFlash(__('The auditions dancestyle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The auditions dancestyle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
