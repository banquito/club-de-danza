<?php
App::uses('AppController', 'Controller');
/**
 * Professions Controller
 *
 * @property Profession $Profession
 * @property PaginatorComponent $Paginator
 */
class ProfessionsController extends AppController {

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
		$this->Profession->recursive = 0;
		$this->set('professions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Profession->exists($id)) {
			throw new NotFoundException(__('Invalid profession'));
		}
		$options = array('conditions' => array('Profession.' . $this->Profession->primaryKey => $id));
		$this->set('profession', $this->Profession->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Profession->create();
			if ($this->Profession->save($this->request->data)) {
				$this->Session->setFlash(__('The profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profession could not be saved. Please, try again.'));
			}
		}
		$users = $this->Profession->User->find('list');
		$auditions = $this->Profession->Audition->find('list');
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
		if (!$this->Profession->exists($id)) {
			throw new NotFoundException(__('Invalid profession'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Profession->save($this->request->data)) {
				$this->Session->setFlash(__('The profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profession could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Profession.' . $this->Profession->primaryKey => $id));
			$this->request->data = $this->Profession->find('first', $options);
		}
		$users = $this->Profession->User->find('list');
		$auditions = $this->Profession->Audition->find('list');
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
		$this->Profession->id = $id;
		if (!$this->Profession->exists()) {
			throw new NotFoundException(__('Invalid profession'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Profession->delete()) {
			$this->Session->setFlash(__('The profession has been deleted.'));
		} else {
			$this->Session->setFlash(__('The profession could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
