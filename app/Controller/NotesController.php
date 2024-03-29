<?php
App::uses('AppController', 'Controller');

/**
 * Notes Controller
 *
 * @property Note $Note
 * @property PaginatorComponent $Paginator
 */
class NotesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $helpers = array('Time');

	public $paginate = array(
		'limit' => 15,
		'order' => array(
			'Note.created' => 'DESC'
		)
	);

	/*************************************************************************************************************************
	* Autentication
	**************************************************************************************************************************/

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('inicio', 'view', 'related');
	}

	public function isAuthorized($user) {
		$artist = array('index');
		$admin = array('add', 'delete', 'edit', 'index');

		// All artist users can index posts
		if (in_array($this->action, $artist)) {
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

	/*************************************************************************************************************************
	* /autentication
	**************************************************************************************************************************/

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$note = $this->request->data;
			$image = '';

			# Se setea el usuario creador de la nota = usuario logeado
			$note['Note']['user_id'] = AuthComponent::user('id');
			
			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($note['Note']['image']['name']) && ($note['Note']['image']['name'] != '')) {
				$imageName = $note['Note']['image']['name'];
				$uploadDir = IMAGES_URL . 'notes/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($note['Note']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $note));
				}
				
				$image = $imageName;
			}


			$note['Note']['image'] = $image;

			$this->Note->create();
			if ($this->Note->save($note)) {
				$this->Session->setFlash(__('The note has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The note could not be saved. Please, try again.'));
			}
		}
	}


/**
 * getElements method
 *
 * @return void
 */
	public function getElements() {
		// $options['conditions'] = array('element-date >=' => date('Y-m-d H:i'));
		$options['fields'] = array('id', 'title', 'image');
		$options['order'] = array('created' => 'DESC');
		$options['recursive'] = -1;
		return $this->Note->find('all', $options);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Note->recursive = 0;
		$this->set('notes', $this->Paginator->paginate());
	}

	public function inicio() {
		$this->Note->recursive = -1;
		$items = $this->requestAction(array('controller' => 'slidernotes', 'action' => 'getItems')
			, array('named' => array('category' => 1))
		);
		
		$this->Paginator->settings = $this->paginate;

		$this->set(compact('items'));
		$this->set('notes', $this->Paginator->paginate());
	}


	public function related($id = null) {
		if (!$this->Note->exists($id)) {
			throw new NotFoundException(__('Invalid note'));
		}

		$current_note = $this->Note->findById($id);

		$options['limit'] = 4;
		$options['order'] = 'RAND()';
		$options['by'] = array_map('trim',explode(",",$current_note['Note']['tags']));
		$options['model'] = 'Note';

		$conditions = array("Note.id !=" => $id);
		$options['conditions'] = $conditions;
		
		// return $this->Note->find('all', $options);
		return $this->Note->Tagged->find('tagged', $options);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Note->exists($id)) {
			throw new NotFoundException(__('Invalid note'));
		}
		$options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
		$this->set('note', $this->Note->find('first', $options));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Note->exists($id)) {
			throw new NotFoundException(__('Invalid note'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			$note = $this->request->data;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($note['Note']['image']['name']) 
					&& ($note['Note']['image']['name'] != '')
					&& isset($note['Note']['image']['tmp_name'])
					&& ($note['Note']['image']['tmp_name'] != '')) {
				
				$imageName = $note['Note']['image']['name'];
				$uploadDir = IMAGES_URL . 'notes/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($note['Note']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $note));
				}
				
				$note['Note']['image'] = $imageName;

			} else {
				$note['Note']['image'] = $this -> Note -> field('image', array('id'=>$id));
			}

			if ($this->Note->save($note)) {
				$this->Session->setFlash(__('The note has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The note could not be saved. Please, try again.'));
			}
		
		} else {
			$options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
			$this->request->data = $this->Note->find('first', $options);
		}

		// $users = $this->Note->User->find('list');
		// $this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Note->id = $id;
		if (!$this->Note->exists()) {
			throw new NotFoundException(__('Invalid note'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Note->delete()) {
			$this->Session->setFlash(__('The note has been deleted.'));
		} else {
			$this->Session->setFlash(__('The note could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
