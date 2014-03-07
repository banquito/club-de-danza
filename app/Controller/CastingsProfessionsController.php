<?php
App::uses('AppController', 'Controller');
/**
 * CastingsProfessions Controller
 *
 * @property CastingsProfession $CastingsProfession
 * @property PaginatorComponent $Paginator
 */
class CastingsProfessionsController extends AppController {

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
		$this->CastingsProfession->recursive = 0;
		$this->set('castingsProfessions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CastingsProfession->exists($id)) {
			throw new NotFoundException(__('Invalid castings profession'));
		}
		$options = array('conditions' => array('CastingsProfession.' . $this->CastingsProfession->primaryKey => $id));
		$this->set('castingsProfession', $this->CastingsProfession->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CastingsProfession->create();
			if ($this->CastingsProfession->save($this->request->data)) {
				$this->Session->setFlash(__('The castings profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The castings profession could not be saved. Please, try again.'));
			}
		}
		$auditions = $this->CastingsProfession->Audition->find('list');
		$professions = $this->CastingsProfession->Profession->find('list');
		$users = $this->CastingsProfession->User->find('list');
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
		if (!$this->CastingsProfession->exists($id)) {
			throw new NotFoundException(__('Invalid castings profession'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CastingsProfession->save($this->request->data)) {
				$this->Session->setFlash(__('The castings profession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The castings profession could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CastingsProfession.' . $this->CastingsProfession->primaryKey => $id));
			$this->request->data = $this->CastingsProfession->find('first', $options);
		}
		$auditions = $this->CastingsProfession->Audition->find('list');
		$professions = $this->CastingsProfession->Profession->find('list');
		$users = $this->CastingsProfession->User->find('list');
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
		$this->CastingsProfession->id = $id;
		if (!$this->CastingsProfession->exists()) {
			throw new NotFoundException(__('Invalid castings profession'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CastingsProfession->delete()) {
			$this->Session->setFlash(__('The castings profession has been deleted.'));
		} else {
			$this->Session->setFlash(__('The castings profession could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
