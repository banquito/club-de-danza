<?php
App::uses('AppController', 'Controller');
/**
 * PracticeroomsPhotos Controller
 *
 * @property PracticeroomsPhoto $PracticeroomsPhoto
 * @property PaginatorComponent $Paginator
 */
class PracticeroomsPhotosController extends AppController {

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
			if ($this->PracticeroomsPhoto->isOwnedBy($elementId, $user['id'])) {
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
		$this->PracticeroomsPhoto->recursive = 0;
		$this->set('practiceroomsPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PracticeroomsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid practicerooms photo'));
		}
		$options = array('conditions' => array('PracticeroomsPhoto.' . $this->PracticeroomsPhoto->primaryKey => $id));
		$this->set('practiceroomsPhoto', $this->PracticeroomsPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PracticeroomsPhoto->create();
			if ($this->PracticeroomsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The practicerooms photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practicerooms photo could not be saved. Please, try again.'));
			}
		}
		$estudies = $this->PracticeroomsPhoto->Estudy->find('list');
		$photos = $this->PracticeroomsPhoto->Photo->find('list');
		$users = $this->PracticeroomsPhoto->User->find('list');
		$this->set(compact('estudies', 'photos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PracticeroomsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid practicerooms photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PracticeroomsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The practicerooms photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practicerooms photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PracticeroomsPhoto.' . $this->PracticeroomsPhoto->primaryKey => $id));
			$this->request->data = $this->PracticeroomsPhoto->find('first', $options);
		}
		$estudies = $this->PracticeroomsPhoto->Estudy->find('list');
		$photos = $this->PracticeroomsPhoto->Photo->find('list');
		$users = $this->PracticeroomsPhoto->User->find('list');
		$this->set(compact('estudies', 'photos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PracticeroomsPhoto->id = $id;
		if (!$this->PracticeroomsPhoto->exists()) {
			throw new NotFoundException(__('Invalid practicerooms photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PracticeroomsPhoto->delete()) {
			$this->Session->setFlash(__('The practicerooms photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms photo could not be deleted. Please, try again.'));
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
		$this->PracticeroomsPhoto->id = $id;
		if (!$this->PracticeroomsPhoto->exists()) {
			throw new NotFoundException(__('Invalid practicerooms photo'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->PracticeroomsPhoto->delete()) {
			$this->Session->setFlash(__('The practicerooms photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms photo could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}
}
