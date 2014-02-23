<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout');
		// $this->Auth->allow('*');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}


public function login() {
		// $this -> layout = 'login';

		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout() {
		$this -> redirect($this -> Auth -> logout());
	}

	public function isAuthorized($user = null) {
		// All registered users can add posts
		// if ($this -> action === 'add') {
		// return true;
		// }

		// Todos los usuarios registrados podrán cambiar su location
		// if ($this->action === 'setLocation') {
		// 	return true;
		// }

		// The owner of a post can edit and delete it
		// if (in_array($this -> action, array(
		// 'edit',
		// 'delete'
		// ))) {
		// $postId = $this -> request -> params['pass'][0];
		// if ($this -> Post -> isOwnedBy($postId, $user['id'])) {
		// return true;
		// }
		// }

		return parent::isAuthorized($user);
	}




/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$user = $this->request->data;
			$rolId = $this->User->Rol->field('id', array('weight' => User::ARTISTA));
			$user['User']['rol_id'] = $rolId;
			
			debug($user, $showHtml = null, $showFrom = true);

			if(isset($user['User']['birthday'])):
				$birthday = DateTime::createFromFormat('d/m/Y', $user['User']['birthday']);
				$user['User']['birthday'] = $birthday->format('Y-m-d H:i:s');
			endif;

			# Se crea el usuario y se lo autorregistra
			$this->User->create();
			if ($this->User->save($user)) {
				$id = $this->User->id;
		        $user['User'] = array_merge(
		            $user['User'],
		            array('id' => $id)
		        );
		        $this->Auth->login($user['User']);
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}

		$states = $this->User->State->find('list');
		$this->set(compact('states'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$rols = $this->User->Rol->find('list');
		$states = $this->User->State->find('list');
		$this->set(compact('rols', 'states'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
