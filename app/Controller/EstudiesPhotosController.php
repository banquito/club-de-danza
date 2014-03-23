<?php
App::uses('AppController', 'Controller');
/**
 * EstudiesPhotos Controller
 *
 * @property EstudiesPhoto $EstudiesPhoto
 * @property PaginatorComponent $Paginator
 */
class EstudiesPhotosController extends AppController {

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
			if ($this->EstudiesPhoto->isOwnedBy($elementId, $user['id'])) {
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
		$this->EstudiesPhoto->recursive = 0;
		$this->set('estudiesPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EstudiesPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid estudies photo'));
		}
		$options = array('conditions' => array('EstudiesPhoto.' . $this->EstudiesPhoto->primaryKey => $id));
		$this->set('estudiesPhoto', $this->EstudiesPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EstudiesPhoto->create();
			if ($this->EstudiesPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The estudies photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudies photo could not be saved. Please, try again.'));
			}
		}
		$estudies = $this->EstudiesPhoto->Estudy->find('list');
		$photos = $this->EstudiesPhoto->Photo->find('list');
		$users = $this->EstudiesPhoto->User->find('list');
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
		if (!$this->EstudiesPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid estudies photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EstudiesPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The estudies photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudies photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EstudiesPhoto.' . $this->EstudiesPhoto->primaryKey => $id));
			$this->request->data = $this->EstudiesPhoto->find('first', $options);
		}
		$estudies = $this->EstudiesPhoto->Estudy->find('list');
		$photos = $this->EstudiesPhoto->Photo->find('list');
		$users = $this->EstudiesPhoto->User->find('list');
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
		$this->EstudiesPhoto->id = $id;
		if (!$this->EstudiesPhoto->exists()) {
			throw new NotFoundException(__('Invalid estudies photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EstudiesPhoto->delete()) {
			$this->Session->setFlash(__('The estudies photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The estudies photo could not be deleted. Please, try again.'));
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
		$this->EstudiesPhoto->id = $id;
		if (!$this->EstudiesPhoto->exists()) {
			throw new NotFoundException(__('Invalid estudies photo'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->EstudiesPhoto->delete()) {
			$this->Session->setFlash(__('The estudies photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The estudies photo could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}
}
