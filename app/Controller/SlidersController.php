<?php
App::uses('AppController', 'Controller');
/**
 * Sliders Controller
 *
 * @property Slider $Slider
 * @property PaginatorComponent $Paginator
 */
class SlidersController extends AppController {

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
			$slider = $this->request->data;
			$image = '';

			# Se setea el usuario creador de la nota = usuario logeado
			$slider['Slider']['user_id'] = AuthComponent::user('id');
			
			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($slider['Slider']['image']['name']) && ($slider['Slider']['image']['name'] != '')) {
				$imageName = $slider['Slider']['image']['name'];
				$uploadDir = IMAGES_URL . 'sliders/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($slider['Slider']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $slider));
				}
				
				$image = $imageName;
			}

			$slider['Slider']['image'] = $image;

			$this->Slider->create();
			if ($this->Slider->save($slider)) {
				$this->Session->setFlash(__('The slider has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slider could not be saved. Please, try again.'));
			}
		}
	}

	public function getItems($value='')
	{
		return $this->Slider->find('published');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Slider->recursive = 0;
		$this->set('sliders', $this->Paginator->paginate());
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
		if (!$this->Slider->exists($id)) {
			throw new NotFoundException(__('Invalid slider'));
		}
		$options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
		$this->set('slider', $this->Slider->find('first', $options));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Slider->exists($id)) {
			throw new NotFoundException(__('Invalid slider'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$slider = $this->request->data;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($slider['Slider']['image']['name']) 
					&& ($slider['Slider']['image']['name'] != '')
					&& isset($slider['Slider']['image']['tmp_name'])
					&& ($slider['Slider']['image']['tmp_name'] != '')) {
				
				$imageName = $slider['Slider']['image']['name'];
				$uploadDir = IMAGES_URL . 'sliders/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($slider['Slider']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $slider));
				}
				
				$slider['Slider']['image'] = $imageName;
			
			} else {
				$slider['Slider']['image'] = $this -> Slider -> field('image', array('id'=>$id));
			}

			if ($this->Slider->save($slider)) {
				$this->Session->setFlash(__('The slider has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slider could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
			$this->request->data = $this->Slider->find('first', $options);
		}
		$users = $this->Slider->User->find('list');
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
		$this->Slider->id = $id;
		if (!$this->Slider->exists()) {
			throw new NotFoundException(__('Invalid slider'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Slider->delete()) {
			$this->Session->setFlash(__('The slider has been deleted.'));
		} else {
			$this->Session->setFlash(__('The slider could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
