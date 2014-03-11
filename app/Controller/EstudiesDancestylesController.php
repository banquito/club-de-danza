<?php
App::uses('AppController', 'Controller');
/**
 * EstudiesDancestyles Controller
 *
 * @property EstudiesDancestyle $EstudiesDancestyle
 * @property PaginatorComponent $Paginator
 */
class EstudiesDancestylesController extends AppController {

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
		$this->EstudiesDancestyle->recursive = 0;
		$this->set('estudiesDancestyles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EstudiesDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid estudies dancestyle'));
		}
		$options = array('conditions' => array('EstudiesDancestyle.' . $this->EstudiesDancestyle->primaryKey => $id));
		$this->set('estudiesDancestyle', $this->EstudiesDancestyle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EstudiesDancestyle->create();
			if ($this->EstudiesDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The estudies dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudies dancestyle could not be saved. Please, try again.'));
			}
		}
		$estudies = $this->EstudiesDancestyle->Estudy->find('list');
		$dancestyles = $this->EstudiesDancestyle->Dancestyle->find('list');
		$users = $this->EstudiesDancestyle->User->find('list');
		$this->set(compact('estudies', 'dancestyles', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EstudiesDancestyle->exists($id)) {
			throw new NotFoundException(__('Invalid estudies dancestyle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EstudiesDancestyle->save($this->request->data)) {
				$this->Session->setFlash(__('The estudies dancestyle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudies dancestyle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EstudiesDancestyle.' . $this->EstudiesDancestyle->primaryKey => $id));
			$this->request->data = $this->EstudiesDancestyle->find('first', $options);
		}
		$estudies = $this->EstudiesDancestyle->Estudy->find('list');
		$dancestyles = $this->EstudiesDancestyle->Dancestyle->find('list');
		$users = $this->EstudiesDancestyle->User->find('list');
		$this->set(compact('estudies', 'dancestyles', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EstudiesDancestyle->id = $id;
		if (!$this->EstudiesDancestyle->exists()) {
			throw new NotFoundException(__('Invalid estudies dancestyle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EstudiesDancestyle->delete()) {
			$this->Session->setFlash(__('The estudies dancestyle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The estudies dancestyle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
