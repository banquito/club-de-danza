<?php
App::uses('AppController', 'Controller');
/**
 * AccessoriesVideos Controller
 *
 * @property AccessoriesVideo $AccessoriesVideo
 * @property PaginatorComponent $Paginator
 */
class AccessoriesVideosController extends AppController {

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
			if ($this->AccessoriesVideo->isOwnedBy($elementId, $user['id'])) {
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
		$this->AccessoriesVideo->recursive = 0;
		$this->set('accessoriesVideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AccessoriesVideo->exists($id)) {
			throw new NotFoundException(__('Invalid accessories video'));
		}
		$options = array('conditions' => array('AccessoriesVideo.' . $this->AccessoriesVideo->primaryKey => $id));
		$this->set('accessoriesVideo', $this->AccessoriesVideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AccessoriesVideo->create();
			if ($this->AccessoriesVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The accessories video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessories video could not be saved. Please, try again.'));
			}
		}
		$accessories = $this->AccessoriesVideo->Accessory->find('list');
		$videos = $this->AccessoriesVideo->Video->find('list');
		$users = $this->AccessoriesVideo->User->find('list');
		$this->set(compact('accessories', 'videos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AccessoriesVideo->exists($id)) {
			throw new NotFoundException(__('Invalid accessories video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AccessoriesVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The accessories video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessories video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AccessoriesVideo.' . $this->AccessoriesVideo->primaryKey => $id));
			$this->request->data = $this->AccessoriesVideo->find('first', $options);
		}
		$accessories = $this->AccessoriesVideo->Accessory->find('list');
		$videos = $this->AccessoriesVideo->Video->find('list');
		$users = $this->AccessoriesVideo->User->find('list');
		$this->set(compact('accessories', 'videos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AccessoriesVideo->id = $id;
		if (!$this->AccessoriesVideo->exists()) {
			throw new NotFoundException(__('Invalid accessories video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AccessoriesVideo->delete()) {
			$this->Session->setFlash(__('The accessories video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The accessories video could not be deleted. Please, try again.'));
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
		$this->AccessoriesVideo->id = $id;
		if (!$this->AccessoriesVideo->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->AccessoriesVideo->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}

}
