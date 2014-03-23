<?php
App::uses('AppController', 'Controller');
/**
 * Slidernotes Controller
 *
 * @property Slidernote $Slidernote
 * @property PaginatorComponent $Paginator
 */
class SlidernotesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $helpers = array('Time');

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('getItems');
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$slidernote = $this->request->data;
			$image = '';

			# Se setea el usuario creador de la nota = usuario logeado
			$slidernote['Slidernote']['user_id'] = AuthComponent::user('id');
			
			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($slidernote['Slidernote']['image']['name']) && ($slidernote['Slidernote']['image']['name'] != '')) {
				$imageName = $slidernote['Slidernote']['image']['name'];
				$uploadDir = IMAGES_URL . 'slidernotes/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($slidernote['Slidernote']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $slidernote));
				}
				
				$image = $imageName;
			}

			$slidernote['Slidernote']['image'] = $image;

			$this->Slidernote->create();
			if ($this->Slidernote->save($slidernote)) {
				$this->Session->setFlash(__('The slidernote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slidernote could not be saved. Please, try again.'));
			}
		}
	}

	public function getItems($value='')
	{
		return $this->Slidernote->find('published');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Slidernote->recursive = 0;
		$this->set('slidernotes', $this->Paginator->paginate());
	}


	public function isAuthorized($user) {
		$registered = array();
		$admin = array('add', 'delete', 'edit', 'index');

		// All registered users can index posts
		if (in_array($this->action, $registered)) {
			return true;
		}

		// // The owner of a post can edit and delete it
		// if (in_array($this->action, array('edit', 'delete'))) {
			// $postId = $this->request->params['pass'][0];
			// if ($this->Post->isOwnedBy($postId, $user['id'])) {
				// return true;
			// }
		// }

		// $user = AuthComponent::user();  # creo que está demás...

		# Usuario administrador(500) y superiores
		if ($user['Rol']['weight'] >= User::ADMIN) {
			if (in_array($this->action, $admin)) {
				return true;
			}
		}

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
		if (!$this->Slidernote->exists($id)) {
			throw new NotFoundException(__('Invalid slidernote'));
		}
		$options = array('conditions' => array('Slidernote.' . $this->Slidernote->primaryKey => $id));
		$this->set('slidernote', $this->Slidernote->find('first', $options));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Slidernote->exists($id)) {
			throw new NotFoundException(__('Invalid slidernote'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$slidernote = $this->request->data;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($slidernote['Slidernote']['image']['name']) 
					&& ($slidernote['Slidernote']['image']['name'] != '')
					&& isset($slidernote['Slidernote']['image']['tmp_name'])
					&& ($slidernote['Slidernote']['image']['tmp_name'] != '')) {
				
				$imageName = $slidernote['Slidernote']['image']['name'];
				$uploadDir = IMAGES_URL . 'slidernotes/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($slidernote['Slidernote']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $slidernote));
				}
				
				$slidernote['Slidernote']['image'] = $imageName;
			
			} else {
				$slidernote['Slidernote']['image'] = $this -> Slidernote -> field('image', array('id'=>$id));
			}

			if ($this->Slidernote->save($slidernote)) {
				$this->Session->setFlash(__('The slidernote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slidernote could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Slidernote.' . $this->Slidernote->primaryKey => $id));
			$this->request->data = $this->Slidernote->find('first', $options);
		}
		$users = $this->Slidernote->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Slidernote->id = $id;
		if (!$this->Slidernote->exists()) {
			throw new NotFoundException(__('Invalid slidernote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Slidernote->delete()) {
			$this->Session->setFlash(__('The slidernote has been deleted.'));
		} else {
			$this->Session->setFlash(__('The slidernote could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
