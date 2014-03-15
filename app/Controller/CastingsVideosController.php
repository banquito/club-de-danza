<?php
App::uses('AppController', 'Controller');
/**
 * CastingsVideos Controller
 *
 * @property CastingsVideo $CastingsVideo
 * @property PaginatorComponent $Paginator
 */
class CastingsVideosController extends AppController {

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
			if ($this->CastingsVideo->isOwnedBy($elementId, $user['id'])) {
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
		$this->CastingsVideo->recursive = 0;
		$this->set('castingsVideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CastingsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid castings video'));
		}
		$options = array('conditions' => array('CastingsVideo.' . $this->CastingsVideo->primaryKey => $id));
		$this->set('castingsVideo', $this->CastingsVideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CastingsVideo->create();
			if ($this->CastingsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The castings video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The castings video could not be saved. Please, try again.'));
			}
		}
		$castings = $this->CastingsVideo->Casting->find('list');
		$videos = $this->CastingsVideo->Video->find('list');
		$users = $this->CastingsVideo->User->find('list');
		$this->set(compact('castings', 'videos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CastingsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid castings video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CastingsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The castings video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The castings video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CastingsVideo.' . $this->CastingsVideo->primaryKey => $id));
			$this->request->data = $this->CastingsVideo->find('first', $options);
		}
		$castings = $this->CastingsVideo->Casting->find('list');
		$videos = $this->CastingsVideo->Video->find('list');
		$users = $this->CastingsVideo->User->find('list');
		$this->set(compact('castings', 'videos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CastingsVideo->id = $id;
		if (!$this->CastingsVideo->exists()) {
			throw new NotFoundException(__('Invalid castings video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CastingsVideo->delete()) {
			$this->Session->setFlash(__('The castings video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The castings video could not be deleted. Please, try again.'));
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
		$this->CastingsVideo->id = $id;
		if (!$this->CastingsVideo->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->CastingsVideo->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

}
