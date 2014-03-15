<?php
App::uses('AppController', 'Controller');
/**
 * PracticeroomsVideos Controller
 *
 * @property PracticeroomsVideo $PracticeroomsVideo
 * @property PaginatorComponent $Paginator
 */
class PracticeroomsVideosController extends AppController {

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
			if ($this->PracticeroomsVideo->isOwnedBy($elementId, $user['id'])) {
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
		$this->PracticeroomsVideo->recursive = 0;
		$this->set('practiceroomsVideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PracticeroomsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid practicerooms video'));
		}
		$options = array('conditions' => array('PracticeroomsVideo.' . $this->PracticeroomsVideo->primaryKey => $id));
		$this->set('practiceroomsVideo', $this->PracticeroomsVideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PracticeroomsVideo->create();
			if ($this->PracticeroomsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The practicerooms video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practicerooms video could not be saved. Please, try again.'));
			}
		}
		$practicerooms = $this->PracticeroomsVideo->Practiceroom->find('list');
		$videos = $this->PracticeroomsVideo->Video->find('list');
		$users = $this->PracticeroomsVideo->User->find('list');
		$this->set(compact('practicerooms', 'videos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PracticeroomsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid practicerooms video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PracticeroomsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The practicerooms video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practicerooms video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PracticeroomsVideo.' . $this->PracticeroomsVideo->primaryKey => $id));
			$this->request->data = $this->PracticeroomsVideo->find('first', $options);
		}
		$practicerooms = $this->PracticeroomsVideo->Practiceroom->find('list');
		$videos = $this->PracticeroomsVideo->Video->find('list');
		$users = $this->PracticeroomsVideo->User->find('list');
		$this->set(compact('practicerooms', 'videos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PracticeroomsVideo->id = $id;
		if (!$this->PracticeroomsVideo->exists()) {
			throw new NotFoundException(__('Invalid practicerooms video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PracticeroomsVideo->delete()) {
			$this->Session->setFlash(__('The practicerooms video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms video could not be deleted. Please, try again.'));
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
		$this->PracticeroomsVideo->id = $id;
		if (!$this->PracticeroomsVideo->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->PracticeroomsVideo->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

}
