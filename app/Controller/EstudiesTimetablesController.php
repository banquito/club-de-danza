<?php
App::uses('AppController', 'Controller');
/**
 * EstudiesTimetables Controller
 *
 * @property EstudiesTimetable $EstudiesTimetable
 * @property PaginatorComponent $Paginator
 */
class EstudiesTimetablesController extends AppController {

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
		$this->EstudiesTimetable->recursive = 0;
		$this->set('estudiesTimetables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EstudiesTimetable->exists($id)) {
			throw new NotFoundException(__('Invalid estudies timetable'));
		}
		$options = array('conditions' => array('EstudiesTimetable.' . $this->EstudiesTimetable->primaryKey => $id));
		$this->set('estudiesTimetable', $this->EstudiesTimetable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EstudiesTimetable->create();
			if ($this->EstudiesTimetable->save($this->request->data)) {
				$this->Session->setFlash(__('The estudies timetable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudies timetable could not be saved. Please, try again.'));
			}
		}
		$estudies = $this->EstudiesTimetable->Estudy->find('list');
		$timetables = $this->EstudiesTimetable->Timetable->find('list');
		$this->set(compact('estudies', 'timetables'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EstudiesTimetable->exists($id)) {
			throw new NotFoundException(__('Invalid estudies timetable'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EstudiesTimetable->save($this->request->data)) {
				$this->Session->setFlash(__('The estudies timetable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudies timetable could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EstudiesTimetable.' . $this->EstudiesTimetable->primaryKey => $id));
			$this->request->data = $this->EstudiesTimetable->find('first', $options);
		}
		$estudies = $this->EstudiesTimetable->Estudy->find('list');
		$timetables = $this->EstudiesTimetable->Timetable->find('list');
		$this->set(compact('estudies', 'timetables'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EstudiesTimetable->id = $id;
		if (!$this->EstudiesTimetable->exists()) {
			throw new NotFoundException(__('Invalid estudies timetable'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EstudiesTimetable->delete()) {
			$this->Session->setFlash(__('The estudies timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The estudies timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
