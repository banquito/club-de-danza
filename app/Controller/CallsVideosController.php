<?php
App::uses('AppController', 'Controller');
/**
 * CallsVideos Controller
 *
 * @property CallsVideo $CallsVideo
 * @property PaginatorComponent $Paginator
 */
class CallsVideosController extends AppController {

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
			if ($this->CallsVideo->isOwnedBy($elementId, $user['id'])) {
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
		$this->CallsVideo->recursive = 0;
		$this->set('callsVideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CallsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid calls video'));
		}
		$options = array('conditions' => array('CallsVideo.' . $this->CallsVideo->primaryKey => $id));
		$this->set('callsVideo', $this->CallsVideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CallsVideo->create();
			if ($this->CallsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The calls video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls video could not be saved. Please, try again.'));
			}
		}
		$calls = $this->CallsVideo->Call->find('list');
		$videos = $this->CallsVideo->Video->find('list');
		$users = $this->CallsVideo->User->find('list');
		$this->set(compact('calls', 'videos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CallsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid calls video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CallsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The calls video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CallsVideo.' . $this->CallsVideo->primaryKey => $id));
			$this->request->data = $this->CallsVideo->find('first', $options);
		}
		$calls = $this->CallsVideo->Call->find('list');
		$videos = $this->CallsVideo->Video->find('list');
		$users = $this->CallsVideo->User->find('list');
		$this->set(compact('calls', 'videos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CallsVideo->id = $id;
		if (!$this->CallsVideo->exists()) {
			throw new NotFoundException(__('Invalid calls video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CallsVideo->delete()) {
			$this->Session->setFlash(__('The calls video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calls video could not be deleted. Please, try again.'));
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
		$this->CallsVideo->id = $id;
		if (!$this->CallsVideo->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->CallsVideo->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

}
