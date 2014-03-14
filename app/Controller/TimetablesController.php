<?php
App::uses('AppController', 'Controller');
/**
 * Timetables Controller
 *
 * @property Timetable $Timetable
 * @property PaginatorComponent $Paginator
 */
class TimetablesController extends AppController {

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
		$this->Timetable->recursive = 0;
		$this->set('timetables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Timetable->exists($id)) {
			throw new NotFoundException(__('Invalid timetable'));
		}
		$options = array('conditions' => array('Timetable.' . $this->Timetable->primaryKey => $id));
		$this->set('timetable', $this->Timetable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Timetable->create();
			if ($this->Timetable->save($this->request->data)) {
				$this->Session->setFlash(__('The timetable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timetable could not be saved. Please, try again.'));
			}
		}
		$practicerooms = $this->Timetable->Practiceroom->find('list');
		$this->set(compact('practicerooms'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Timetable->exists($id)) {
			throw new NotFoundException(__('Invalid timetable'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Timetable->save($this->request->data)) {
				$this->Session->setFlash(__('The timetable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timetable could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Timetable.' . $this->Timetable->primaryKey => $id));
			$this->request->data = $this->Timetable->find('first', $options);
		}
		$practicerooms = $this->Timetable->Practiceroom->find('list');
		$this->set(compact('practicerooms'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Timetable->id = $id;
		if (!$this->Timetable->exists()) {
			throw new NotFoundException(__('Invalid timetable'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Timetable->delete()) {
			$this->Session->setFlash(__('The timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
