<?php
App::uses('AppController', 'Controller');
/**
 * AuditionsProfessions Controller
 *
 * @property AuditionsProfession $AuditionsProfession
 * @property PaginatorComponent $Paginator
 */
class AuditionsProfessionsController extends AppController {

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
		$this->AuditionsProfession->recursive = 0;
		$this->set('auditionsProfessions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AuditionsProfession->exists($id)) {
			throw new NotFoundException(__('Invalid auditions profession'));
		}
		$options = array('conditions' => array('AuditionsProfession.' . $this->AuditionsProfession->primaryKey => $id));
		$this->set('auditionsProfession', $this->AuditionsProfession->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AuditionsProfession->create();
			if ($this->AuditionsProfession->save($this->request->data)) {
				$this->Session->setFlash(__('The auditions profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auditions profession could not be saved. Please, try again.'));
			}
		}
		$auditions = $this->AuditionsProfession->Audition->find('list');
		$professions = $this->AuditionsProfession->Profession->find('list');
		$users = $this->AuditionsProfession->User->find('list');
		$this->set(compact('auditions', 'professions', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AuditionsProfession->exists($id)) {
			throw new NotFoundException(__('Invalid auditions profession'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AuditionsProfession->save($this->request->data)) {
				$this->Session->setFlash(__('The auditions profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auditions profession could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AuditionsProfession.' . $this->AuditionsProfession->primaryKey => $id));
			$this->request->data = $this->AuditionsProfession->find('first', $options);
		}
		$auditions = $this->AuditionsProfession->Audition->find('list');
		$professions = $this->AuditionsProfession->Profession->find('list');
		$users = $this->AuditionsProfession->User->find('list');
		$this->set(compact('auditions', 'professions', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AuditionsProfession->id = $id;
		if (!$this->AuditionsProfession->exists()) {
			throw new NotFoundException(__('Invalid auditions profession'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AuditionsProfession->delete()) {
			$this->Session->setFlash(__('The auditions profession has been deleted.'));
		} else {
			$this->Session->setFlash(__('The auditions profession could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
