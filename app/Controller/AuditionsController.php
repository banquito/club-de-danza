<?php
App::uses('AppController', 'Controller');
/**
 * Auditions Controller
 *
 * @property Audition $Audition
 * @property PaginatorComponent $Paginator
 */
class AuditionsController extends AppController {

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
		$this->Auth->allow('index');
	}

	public function isAuthorized($user) {
		$artist = array('add');
		$owner = array('edit');
		$admin = array_merge($artist, $owner, array('delete'));

		// All artist users can index posts
		if (in_array($this->action, $artist)) {
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this->action, $owner)) {
			$auditionId = $this->request->params['pass'][0];
			if ($this->Audition->isOwnedBy($auditionId, $user['id'])) {
				return true;
			}
		}

		// $user = AuthComponent::user();  # creo que está demás...

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
		$this->Audition->recursive = 0;
		$this->set('auditions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Audition->exists($id)) {
			throw new NotFoundException(__('Invalid audition'));
		}
		$options = array('conditions' => array('Audition.' . $this->Audition->primaryKey => $id));
		$this->set('audition', $this->Audition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$audition = $this->request->data;

			# Se setea el usuario creador de la nota = usuario logeado
			$audition['Audition']['user_id'] = AuthComponent::user('id');

			$this->Audition->create();
			if ($this->Audition->save($audition)) {
				$this->Session->setFlash(__('The audition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audition could not be saved. Please, try again.'));
			}
		}
		$states = $this->Audition->State->find('list');
		$dancestyles = $this->Audition->Dancestyle->find('list');
		$professions = $this->Audition->Profession->find('list');
		$this->set(compact('states', 'dancestyles', 'professions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Audition->exists($id)) {
			throw new NotFoundException(__('Invalid audition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Audition->save($this->request->data)) {
				$this->Session->setFlash(__('The audition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Audition.' . $this->Audition->primaryKey => $id));
			$this->request->data = $this->Audition->find('first', $options);
		}
		$states = $this->Audition->State->find('list');
		$users = $this->Audition->User->find('list');
		$dancestyles = $this->Audition->Dancestyle->find('list');
		$professions = $this->Audition->Profession->find('list');
		$this->set(compact('states', 'users', 'dancestyles', 'professions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Audition->id = $id;
		if (!$this->Audition->exists()) {
			throw new NotFoundException(__('Invalid audition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Audition->delete()) {
			$this->Session->setFlash(__('The audition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The audition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
