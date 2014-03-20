<?php
App::uses('AppController', 'Controller');
/**
 * JobsVideos Controller
 *
 * @property JobsVideo $JobsVideo
 * @property PaginatorComponent $Paginator
 */
class JobsVideosController extends AppController {

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
			if ($this->JobsVideo->isOwnedBy($elementId, $user['id'])) {
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
		$this->JobsVideo->recursive = 0;
		$this->set('jobsVideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JobsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid jobs video'));
		}
		$options = array('conditions' => array('JobsVideo.' . $this->JobsVideo->primaryKey => $id));
		$this->set('jobsVideo', $this->JobsVideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JobsVideo->create();
			if ($this->JobsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs video could not be saved. Please, try again.'));
			}
		}
		$jobs = $this->JobsVideo->Job->find('list');
		$videos = $this->JobsVideo->Video->find('list');
		$users = $this->JobsVideo->User->find('list');
		$this->set(compact('jobs', 'videos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->JobsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid jobs video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->JobsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The jobs video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobs video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('JobsVideo.' . $this->JobsVideo->primaryKey => $id));
			$this->request->data = $this->JobsVideo->find('first', $options);
		}
		$jobs = $this->JobsVideo->Job->find('list');
		$videos = $this->JobsVideo->Video->find('list');
		$users = $this->JobsVideo->User->find('list');
		$this->set(compact('jobs', 'videos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->JobsVideo->id = $id;
		if (!$this->JobsVideo->exists()) {
			throw new NotFoundException(__('Invalid jobs video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->JobsVideo->delete()) {
			$this->Session->setFlash(__('The jobs video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The jobs video could not be deleted. Please, try again.'));
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
		$this->JobsVideo->id = $id;
		if (!$this->JobsVideo->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->JobsVideo->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

}
