<?php
App::uses('AppController', 'Controller');
/**
 * CallsPhotos Controller
 *
 * @property CallsPhoto $CallsPhoto
 * @property PaginatorComponent $Paginator
 */
class CallsPhotosController extends AppController {

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
			if ($this->CallsPhoto->isOwnedBy($elementId, $user['id'])) {
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
		$this->CallsPhoto->recursive = 0;
		$this->set('callsPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CallsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid calls photo'));
		}
		$options = array('conditions' => array('CallsPhoto.' . $this->CallsPhoto->primaryKey => $id));
		$this->set('callsPhoto', $this->CallsPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CallsPhoto->create();
			if ($this->CallsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The calls photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls photo could not be saved. Please, try again.'));
			}
		}
		$calls = $this->CallsPhoto->Call->find('list');
		$photos = $this->CallsPhoto->Photo->find('list');
		$users = $this->CallsPhoto->User->find('list');
		$this->set(compact('calls', 'photos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CallsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid calls photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CallsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The calls photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calls photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CallsPhoto.' . $this->CallsPhoto->primaryKey => $id));
			$this->request->data = $this->CallsPhoto->find('first', $options);
		}
		$calls = $this->CallsPhoto->Call->find('list');
		$photos = $this->CallsPhoto->Photo->find('list');
		$users = $this->CallsPhoto->User->find('list');
		$this->set(compact('calls', 'photos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CallsPhoto->id = $id;
		if (!$this->CallsPhoto->exists()) {
			throw new NotFoundException(__('Invalid calls photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CallsPhoto->delete()) {
			$this->Session->setFlash(__('The calls photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calls photo could not be deleted. Please, try again.'));
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
		$this->CallsPhoto->id = $id;
		if (!$this->CallsPhoto->exists()) {
			throw new NotFoundException(__('Invalid calls photo'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->CallsPhoto->delete()) {
			$this->Session->setFlash(__('The calls photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calls photo could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}
}
