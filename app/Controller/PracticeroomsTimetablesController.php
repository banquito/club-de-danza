<?php
App::uses('AppController', 'Controller');
/**
 * PracticeroomsTimetables Controller
 *
 * @property PracticeroomsTimetable $PracticeroomsTimetable
 * @property PaginatorComponent $Paginator
 */
class PracticeroomsTimetablesController extends AppController {

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
		$this->PracticeroomsTimetable->recursive = 0;
		$this->set('practiceroomsTimetables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PracticeroomsTimetable->exists($id)) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$options = array('conditions' => array('PracticeroomsTimetable.' . $this->PracticeroomsTimetable->primaryKey => $id));
		$this->set('practiceroomsTimetable', $this->PracticeroomsTimetable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PracticeroomsTimetable->create();
			if ($this->PracticeroomsTimetable->save($this->request->data)) {
				$this->Session->setFlash(__('The practicerooms timetable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practicerooms timetable could not be saved. Please, try again.'));
			}
		}
		$practicerooms = $this->PracticeroomsTimetable->Practiceroom->find('list');
		$timetables = $this->PracticeroomsTimetable->Timetable->find('list');
		$this->set(compact('practicerooms', 'timetables'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PracticeroomsTimetable->exists($id)) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PracticeroomsTimetable->save($this->request->data)) {
				$this->Session->setFlash(__('The practicerooms timetable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practicerooms timetable could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PracticeroomsTimetable.' . $this->PracticeroomsTimetable->primaryKey => $id));
			$this->request->data = $this->PracticeroomsTimetable->find('first', $options);
		}
		$practicerooms = $this->PracticeroomsTimetable->Practiceroom->find('list');
		$timetables = $this->PracticeroomsTimetable->Timetable->find('list');
		$this->set(compact('practicerooms', 'timetables'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PracticeroomsTimetable->id = $id;
		if (!$this->PracticeroomsTimetable->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PracticeroomsTimetable->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
