<?php
App::uses('AppController', 'Controller');
/**
 * CastingsDancestyles Controller
 *
 * @property CastingsDancestyle $CastingsDancestyle
 * @property PaginatorComponent $Paginator
 */
class CastingsDancestylesController extends AppController {

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
		$this->CastingsDancestyle->recursive = 0;
		$this->set('castingsDancestyles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CastingsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid castings dancestyle'));
		}
		$options = array('conditions' => array('CastingsDancestyle.' . $this->CastingsDancestyle->primaryKey => $id));
		$this->set('castingsDancestyle', $this->CastingsDancestyle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CastingsDancestyle->create();
			if ($this->CastingsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The castings dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The castings dancestyle could not be saved. Please, try again.'));
			}
		}
		$auditions = $this->CastingsDancestyle->Audition->find('list');
		$dancestyles = $this->CastingsDancestyle->Dancestyle->find('list');
		$users = $this->CastingsDancestyle->User->find('list');
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
		if (!$this->CastingsDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid castings dancestyle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CastingsDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The castings dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The castings dancestyle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CastingsDancestyle.' . $this->CastingsDancestyle->primaryKey => $id));
			$this->request->data = $this->CastingsDancestyle->find('first', $options);
		}
		$auditions = $this->CastingsDancestyle->Audition->find('list');
		$dancestyles = $this->CastingsDancestyle->Dancestyle->find('list');
		$users = $this->CastingsDancestyle->User->find('list');
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
		$this->CastingsDancestyle->id = $id;
		if (!$this->CastingsDancestyle->exists()) {
			throw new NotFoundException(__('Invalid castings dancestyle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CastingsDancestyle->delete()) {
			$this->Session->setFlash(__('The castings dancestyle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The castings dancestyle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
