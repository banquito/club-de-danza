<?php
App::uses('AppController', 'Controller');
/**
 * Practicerooms Controller
 *
 * @property Practiceroom $Practiceroom
 * @property PaginatorComponent $Paginator
 */
class PracticeroomsController extends AppController {

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
		$this->Auth->allow('getElements', 'view');
	}

	public function isAuthorized($user) {
		$artist = array('add', 'index');
		$owner = array('delete', 'edit');
		$admin = array_merge($artist, $owner, array());

		// All artist users can index posts
		if (in_array($this->action, $artist)) {
			return true;
		}

		// The owner of an element can edit and delete it
		if (in_array($this->action, $owner)) {
			$elementId = $this->request->params['pass'][0];
			if ($this->Practiceroom->isOwnedBy($elementId, $user['id'])) {
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
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$practiceroom = $this->request->data;

			# Se setea el usuario creador de la nota = usuario logeado
			$practiceroom['Practiceroom']['user_id'] = AuthComponent::user('id');

			if(isset($practiceroom['Practiceroom']['element-date']) && !empty($practiceroom['Practiceroom']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $practiceroom['Practiceroom']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($practiceroom['Practiceroom']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$practiceroom['Practiceroom']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($practiceroom['Practiceroom']['inscription-start']) && !empty($practiceroom['Practiceroom']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $practiceroom['Practiceroom']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($practiceroom['Practiceroom']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$practiceroom['Practiceroom']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($practiceroom['Practiceroom']['inscription-end']) && !empty($practiceroom['Practiceroom']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $practiceroom['Practiceroom']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($practiceroom['Practiceroom']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$practiceroom['Practiceroom']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($practiceroom['Practiceroom']['image']['name']) && ($practiceroom['Practiceroom']['image']['name'] != '')) {
				$imageName = $practiceroom['Practiceroom']['image']['name'];
				$uploadDir = IMAGES_URL . 'practicerooms/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($practiceroom['Practiceroom']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $practiceroom));
				}
				
				$image = $imageName;
			}


			$practiceroom['Practiceroom']['image'] = $image;

			$this->Practiceroom->create();
			if ($this->Practiceroom->save($practiceroom)) {
				$this->Session->setFlash(__('The practiceroom has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practiceroom could not be saved. Please, try again.'));
			}
		}
		$states = $this->Practiceroom->State->find('list');
		$dancestyles = $this->Practiceroom->Dancestyle->find('list');
		$this->set(compact('states', 'dancestyles', 'professions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Practiceroom->id = $id;
		if (!$this->Practiceroom->exists()) {
			throw new NotFoundException(__('Invalid practiceroom'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Practiceroom->delete()) {
			$this->Session->setFlash(__('The practiceroom has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practiceroom could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Practiceroom->exists($id)) {
			throw new NotFoundException(__('Invalid practiceroom'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$practiceroom = $this->request->data;

			if(isset($practiceroom['Practiceroom']['element-date']) && !empty($practiceroom['Practiceroom']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $practiceroom['Practiceroom']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($practiceroom['Practiceroom']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$practiceroom['Practiceroom']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($practiceroom['Practiceroom']['inscription-start']) && !empty($practiceroom['Practiceroom']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $practiceroom['Practiceroom']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($practiceroom['Practiceroom']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$practiceroom['Practiceroom']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($practiceroom['Practiceroom']['inscription-end']) && !empty($practiceroom['Practiceroom']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $practiceroom['Practiceroom']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($practiceroom['Practiceroom']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$practiceroom['Practiceroom']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($practiceroom['Practiceroom']['image']['name']) 
					&& ($practiceroom['Practiceroom']['image']['name'] != '')
					&& isset($practiceroom['Practiceroom']['image']['tmp_name'])
					&& ($practiceroom['Practiceroom']['image']['tmp_name'] != '')) {
				
				$imageName = $practiceroom['Practiceroom']['image']['name'];
				$uploadDir = IMAGES_URL . 'practicerooms/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($practiceroom['Practiceroom']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $practiceroom));
				}
				
				$practiceroom['Practiceroom']['image'] = $imageName;

			} else {
				$practiceroom['Practiceroom']['image'] = $this -> Practiceroom -> field('image', array('id'=>$id));
			}




			if ($this->Practiceroom->save($practiceroom)) {
				$this->Session->setFlash(__('The practiceroom has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The practiceroom could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Practiceroom.' . $this->Practiceroom->primaryKey => $id));
			$this->request->data = $this->Practiceroom->find('first', $options);
		}
		$states = $this->Practiceroom->State->find('list');
		$dancestyles = $this->Practiceroom->Dancestyle->find('list');
		$this->set(compact('states', 'users', 'dancestyles', 'professions'));
	}

/**
 * getElements method
 *
 * @return void
 */
	public function getElements() {
		// $options['conditions'] = array('element-date >=' => date('Y-m-d H:i'));
		$options['fields'] = array('id', 'name', 'image', 'paid');
		$options['order'] = array('paid' => 'DESC', 'created' => 'DESC');
		$options['recursive'] = -1;
		return $this->Practiceroom->find('all', $options);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Practiceroom->recursive = 0;
		
		$rol = AuthComponent::user('Rol');
		if($rol) {
			# El Admin puede ver todos los elementos, pero un usuario común sólo los propios.
			if($rol['weight'] < User::ADMIN) {
				$this->Paginator->settings = array(
					'conditions' => array('Practiceroom.user_id' => AuthComponent::user('id')),
				);
			}
			$this->set('practicerooms', $this->Paginator->paginate());
		} else {
			$this->redirect('/logout');
		}
	}


// /**
//  * index method
//  *
//  * @return void
//  */
// 	public function index() {
// 		$this->Practiceroom->recursive = 0;
// 		$this->set('practicerooms', $this->Paginator->paginate());
// 	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Practiceroom->exists($id)) {
			throw new NotFoundException(__('Invalid practiceroom'));
		}
		$options = array('conditions' => array('Practiceroom.' . $this->Practiceroom->primaryKey => $id));
		$this->set('practiceroom', $this->Practiceroom->find('first', $options));
	}

// /**
//  * add method
//  *
//  * @return void
//  */
// 	public function add() {
// 		if ($this->request->is('post')) {
// 			$this->Practiceroom->create();
// 			if ($this->Practiceroom->save($this->request->data)) {
// 				$this->Session->setFlash(__('The practiceroom has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The practiceroom could not be saved. Please, try again.'));
// 			}
// 		}
// 		$states = $this->Practiceroom->State->find('list');
// 		$users = $this->Practiceroom->User->find('list');
// 		$rooms = $this->Practiceroom->Room->find('list');
// 		$dancestyles = $this->Practiceroom->Dancestyle->find('list');
// 		$this->set(compact('states', 'users', 'rooms', 'dancestyles'));
// 	}

// /**
//  * edit method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function edit($id = null) {
// 		if (!$this->Practiceroom->exists($id)) {
// 			throw new NotFoundException(__('Invalid practiceroom'));
// 		}
// 		if ($this->request->is(array('post', 'put'))) {
// 			if ($this->Practiceroom->save($this->request->data)) {
// 				$this->Session->setFlash(__('The practiceroom has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The practiceroom could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('Practiceroom.' . $this->Practiceroom->primaryKey => $id));
// 			$this->request->data = $this->Practiceroom->find('first', $options);
// 		}
// 		$states = $this->Practiceroom->State->find('list');
// 		$users = $this->Practiceroom->User->find('list');
// 		$rooms = $this->Practiceroom->Room->find('list');
// 		$dancestyles = $this->Practiceroom->Dancestyle->find('list');
// 		$this->set(compact('states', 'users', 'rooms', 'dancestyles'));
// 	}

// /**
//  * delete method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function delete($id = null) {
// 		$this->Practiceroom->id = $id;
// 		if (!$this->Practiceroom->exists()) {
// 			throw new NotFoundException(__('Invalid practiceroom'));
// 		}
// 		$this->request->onlyAllow('post', 'delete');
// 		if ($this->Practiceroom->delete()) {
// 			$this->Session->setFlash(__('The practiceroom has been deleted.'));
// 		} else {
// 			$this->Session->setFlash(__('The practiceroom could not be deleted. Please, try again.'));
// 		}
// 		return $this->redirect(array('action' => 'index'));
// 	}

}
