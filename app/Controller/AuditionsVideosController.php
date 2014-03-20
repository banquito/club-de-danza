<?php
App::uses('AppController', 'Controller');
/**
 * AuditionsVideos Controller
 *
 * @property AuditionsVideo $AuditionsVideo
 * @property PaginatorComponent $Paginator
 */
class AuditionsVideosController extends AppController {

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
			if ($this->AuditionsVideo->isOwnedBy($elementId, $user['id'])) {
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
		$this->AuditionsVideo->recursive = 0;
		$this->set('auditionsVideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AuditionsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid auditions video'));
		}
		$options = array('conditions' => array('AuditionsVideo.' . $this->AuditionsVideo->primaryKey => $id));
		$this->set('auditionsVideo', $this->AuditionsVideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AuditionsVideo->create();
			if ($this->AuditionsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The auditions video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auditions video could not be saved. Please, try again.'));
			}
		}
		$auditions = $this->AuditionsVideo->Audition->find('list');
		$videos = $this->AuditionsVideo->Video->find('list');
		$users = $this->AuditionsVideo->User->find('list');
		$this->set(compact('auditions', 'videos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AuditionsVideo->exists($id)) {
			throw new NotFoundException(__('Invalid auditions video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AuditionsVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The auditions video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auditions video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AuditionsVideo.' . $this->AuditionsVideo->primaryKey => $id));
			$this->request->data = $this->AuditionsVideo->find('first', $options);
		}
		$auditions = $this->AuditionsVideo->Audition->find('list');
		$videos = $this->AuditionsVideo->Video->find('list');
		$users = $this->AuditionsVideo->User->find('list');
		$this->set(compact('auditions', 'videos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AuditionsVideo->id = $id;
		if (!$this->AuditionsVideo->exists()) {
			throw new NotFoundException(__('Invalid auditions video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AuditionsVideo->delete()) {
			$this->Session->setFlash(__('The auditions video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The auditions video could not be deleted. Please, try again.'));
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
		$this->AuditionsVideo->id = $id;
		if (!$this->AuditionsVideo->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->AuditionsVideo->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

}
