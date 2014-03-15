<?php
App::uses('AppController', 'Controller');
/**
 * EstudiesVideos Controller
 *
 * @property EstudiesVideo $EstudiesVideo
 * @property PaginatorComponent $Paginator
 */
class EstudiesVideosController extends AppController {

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
			if ($this->EstudiesVideo->isOwnedBy($elementId, $user['id'])) {
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
		$this->EstudiesVideo->recursive = 0;
		$this->set('estudiesVideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EstudiesVideo->exists($id)) {
			throw new NotFoundException(__('Invalid estudies video'));
		}
		$options = array('conditions' => array('EstudiesVideo.' . $this->EstudiesVideo->primaryKey => $id));
		$this->set('estudiesVideo', $this->EstudiesVideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EstudiesVideo->create();
			if ($this->EstudiesVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The estudies video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudies video could not be saved. Please, try again.'));
			}
		}
		$estudies = $this->EstudiesVideo->Estudy->find('list');
		$videos = $this->EstudiesVideo->Video->find('list');
		$users = $this->EstudiesVideo->User->find('list');
		$this->set(compact('estudies', 'videos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EstudiesVideo->exists($id)) {
			throw new NotFoundException(__('Invalid estudies video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EstudiesVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The estudies video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudies video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EstudiesVideo.' . $this->EstudiesVideo->primaryKey => $id));
			$this->request->data = $this->EstudiesVideo->find('first', $options);
		}
		$estudies = $this->EstudiesVideo->Estudy->find('list');
		$videos = $this->EstudiesVideo->Video->find('list');
		$users = $this->EstudiesVideo->User->find('list');
		$this->set(compact('estudies', 'videos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EstudiesVideo->id = $id;
		if (!$this->EstudiesVideo->exists()) {
			throw new NotFoundException(__('Invalid estudies video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EstudiesVideo->delete()) {
			$this->Session->setFlash(__('The estudies video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The estudies video could not be deleted. Please, try again.'));
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
		$this->EstudiesVideo->id = $id;
		if (!$this->EstudiesVideo->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->EstudiesVideo->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

}
