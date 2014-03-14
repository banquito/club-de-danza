<?php
App::uses('AppController', 'Controller');
/**
 * PracticeroomsDancestyles Controller
 *
 * @property PracticeroomsDancestyle $PracticeroomsDancestyle
 * @property PaginatorComponent $Paginator
 */
class PracticeroomsDancestylesController extends AppController {

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
		$this->PracticeroomsDancestyle->recursive = 0;
		$this->set('practiceroomsDancestyles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PracticeroomsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid practicerooms dancestyle'));
		}
		$options = array('conditions' => array('PracticeroomsDancestyle.' . $this->PracticeroomsDancestyle->primaryKey => $id));
		$this->set('practiceroomsDancestyle', $this->PracticeroomsDancestyle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PracticeroomsDancestyle->create();
			if ($this->PracticeroomsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The practicerooms dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practicerooms dancestyle could not be saved. Please, try again.'));
			}
		}
		$practicerooms = $this->PracticeroomsDancestyle->Practiceroom->find('list');
		$dancestyles = $this->PracticeroomsDancestyle->Dancestyle->find('list');
		$users = $this->PracticeroomsDancestyle->User->find('list');
		$this->set(compact('practicerooms', 'dancestyles', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PracticeroomsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid practicerooms dancestyle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PracticeroomsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The practicerooms dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practicerooms dancestyle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PracticeroomsDancestyle.' . $this->PracticeroomsDancestyle->primaryKey => $id));
			$this->request->data = $this->PracticeroomsDancestyle->find('first', $options);
		}
		$practicerooms = $this->PracticeroomsDancestyle->Practiceroom->find('list');
		$dancestyles = $this->PracticeroomsDancestyle->Dancestyle->find('list');
		$users = $this->PracticeroomsDancestyle->User->find('list');
		$this->set(compact('practicerooms', 'dancestyles', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PracticeroomsDancestyle->id = $id;
		if (!$this->PracticeroomsDancestyle->exists()) {
			throw new NotFoundException(__('Invalid practicerooms dancestyle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PracticeroomsDancestyle->delete()) {
			$this->Session->setFlash(__('The practicerooms dancestyle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms dancestyle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
