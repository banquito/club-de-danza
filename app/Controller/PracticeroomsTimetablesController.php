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

	/*************************************************************************************************************************
	* Autentication
	**************************************************************************************************************************/

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}

	public function isAuthorized($user) {
		$artist = array();
		$owner = array('remove');
		$admin = array_merge($artist, $owner, array());

		// All artist users can index posts
		if (in_array($this->action, $artist)) {
			return true;
		}

		// The owner of an element can edit and delete it
		if (in_array($this->action, $owner)) {
			$elementId = $this->request->params['pass'][0];
			if ($this->PracticeroomsTimetable->isOwnedBy($elementId, $user['id'])) {
				return true;
			}
		}

		# Usuario administrador(500) y superiores
		if ($user['Rol']['weight'] >= User::ADMIN) {
			if (in_array($this->action, $admin)) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

	/*************************************************************************************************************************
	* /autentication
	**************************************************************************************************************************/

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
	}

/**
 * remove method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function remove($id = null) {
		$this->PracticeroomsTimetable->id = $id;
		if (!$this->PracticeroomsTimetable->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->PracticeroomsTimetable->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}


}
