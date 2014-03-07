<?php
App::uses('AppController', 'Controller');
/**
 * JobsProfessions Controller
 *
 * @property JobsProfession $JobsProfession
 * @property PaginatorComponent $Paginator
 */
class JobsProfessionsController extends AppController {

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
		$this->JobsProfession->recursive = 0;
		$this->set('jobsProfessions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JobsProfession->exists($id)) {
			throw new NotFoundException(__('Invalid jobs profession'));
		}
		$options = array('conditions' => array('JobsProfession.' . $this->JobsProfession->primaryKey => $id));
		$this->set('jobsProfession', $this->JobsProfession->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JobsProfession->create();
			if ($this->JobsProfession->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs profession could not be saved. Please, try again.'));
			}
		}
		$jobs = $this->JobsProfession->Job->find('list');
		$professions = $this->JobsProfession->Profession->find('list');
		$users = $this->JobsProfession->User->find('list');
		$this->set(compact('jobs', 'professions', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->JobsProfession->exists($id)) {
			throw new NotFoundException(__('Invalid jobs profession'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->JobsProfession->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs profession could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('JobsProfession.' . $this->JobsProfession->primaryKey => $id));
			$this->request->data = $this->JobsProfession->find('first', $options);
		}
		$jobs = $this->JobsProfession->Job->find('list');
		$professions = $this->JobsProfession->Profession->find('list');
		$users = $this->JobsProfession->User->find('list');
		$this->set(compact('jobs', 'professions', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->JobsProfession->id = $id;
		if (!$this->JobsProfession->exists()) {
			throw new NotFoundException(__('Invalid jobs profession'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobsProfession->delete()) {
			$this->Session->setFlash(__('The jobs profession has been deleted.'));
		} else {
			$this->Session->setFlash(__('The jobs profession could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
