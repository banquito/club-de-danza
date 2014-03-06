<?php
App::uses('AppController', 'Controller');
/**
 * CallsProfessions Controller
 *
 * @property CallsProfession $CallsProfession
 * @property PaginatorComponent $Paginator
 */
class CallsProfessionsController extends AppController {

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
		$this->CallsProfession->recursive = 0;
		$this->set('callsProfessions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CallsProfession->exists($id)) {
			throw new NotFoundException(__('Invalid calls profession'));
		}
		$options = array('conditions' => array('CallsProfession.' . $this->CallsProfession->primaryKey => $id));
		$this->set('callsProfession', $this->CallsProfession->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CallsProfession->create();
			if ($this->CallsProfession->save($this->request->data)) {
				$this->Session->setFlash(__('The calls profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls profession could not be saved. Please, try again.'));
			}
		}
		$calls = $this->CallsProfession->Call->find('list');
		$professions = $this->CallsProfession->Profession->find('list');
		$users = $this->CallsProfession->User->find('list');
		$this->set(compact('calls', 'professions', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CallsProfession->exists($id)) {
			throw new NotFoundException(__('Invalid calls profession'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CallsProfession->save($this->request->data)) {
				$this->Session->setFlash(__('The calls profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls profession could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CallsProfession.' . $this->CallsProfession->primaryKey => $id));
			$this->request->data = $this->CallsProfession->find('first', $options);
		}
		$calls = $this->CallsProfession->Call->find('list');
		$professions = $this->CallsProfession->Profession->find('list');
		$users = $this->CallsProfession->User->find('list');
		$this->set(compact('calls', 'professions', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CallsProfession->id = $id;
		if (!$this->CallsProfession->exists()) {
			throw new NotFoundException(__('Invalid calls profession'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CallsProfession->delete()) {
			$this->Session->setFlash(__('The calls profession has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calls profession could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
