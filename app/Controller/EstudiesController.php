<?php
App::uses('AppController', 'Controller');
/**
 * Estudies Controller
 *
 * @property Estudy $Estudy
 * @property PaginatorComponent $Paginator
 */
class EstudiesController extends AppController {

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
			if ($this->Estudy->isOwnedBy($elementId, $user['id'])) {
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
			$estudy = $this->request->data;

			# Se setea el usuario creador de la nota = usuario logeado
			$estudy['Estudy']['user_id'] = AuthComponent::user('id');

			if(isset($estudy['Estudy']['element-date']) && !empty($estudy['Estudy']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $estudy['Estudy']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($estudy['Estudy']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$estudy['Estudy']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($estudy['Estudy']['inscription-start']) && !empty($estudy['Estudy']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $estudy['Estudy']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($estudy['Estudy']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$estudy['Estudy']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($estudy['Estudy']['inscription-end']) && !empty($estudy['Estudy']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $estudy['Estudy']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($estudy['Estudy']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$estudy['Estudy']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($estudy['Estudy']['image']['name']) && ($estudy['Estudy']['image']['name'] != '')) {
				$imageName = $estudy['Estudy']['image']['name'];
				$uploadDir = IMAGES_URL . 'estudies/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($estudy['Estudy']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $estudy));
				}
				
				$image = $imageName;
			}


			$estudy['Estudy']['image'] = $image;

			$this->Estudy->create();
			if ($this->Estudy->save($estudy)) {
				$this->Session->setFlash(__('The estudy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudy could not be saved. Please, try again.'));
			}
		}
		$states = $this->Estudy->State->find('list');
		$dancestyles = $this->Estudy->Dancestyle->find('list');
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
		$this->Estudy->id = $id;
		if (!$this->Estudy->exists()) {
			throw new NotFoundException(__('Invalid estudy'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Estudy->delete()) {
			$this->Session->setFlash(__('The estudy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The estudy could not be deleted. Please, try again.'));
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
		if (!$this->Estudy->exists($id)) {
			throw new NotFoundException(__('Invalid estudy'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$estudy = $this->request->data;

			if(isset($estudy['Estudy']['element-date']) && !empty($estudy['Estudy']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $estudy['Estudy']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($estudy['Estudy']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$estudy['Estudy']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($estudy['Estudy']['inscription-start']) && !empty($estudy['Estudy']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $estudy['Estudy']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($estudy['Estudy']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$estudy['Estudy']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($estudy['Estudy']['inscription-end']) && !empty($estudy['Estudy']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $estudy['Estudy']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($estudy['Estudy']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$estudy['Estudy']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($estudy['Estudy']['image']['name']) 
					&& ($estudy['Estudy']['image']['name'] != '')
					&& isset($estudy['Estudy']['image']['tmp_name'])
					&& ($estudy['Estudy']['image']['tmp_name'] != '')) {
				
				$imageName = $estudy['Estudy']['image']['name'];
				$uploadDir = IMAGES_URL . 'estudies/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($estudy['Estudy']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $estudy));
				}
				
				$estudy['Estudy']['image'] = $imageName;

			} else {
				$estudy['Estudy']['image'] = $this -> Estudy -> field('image', array('id'=>$id));
			}




			if ($this->Estudy->save($estudy)) {
				$this->Session->setFlash(__('The estudy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Estudy.' . $this->Estudy->primaryKey => $id));
			$this->request->data = $this->Estudy->find('first', $options);
		}
		$states = $this->Estudy->State->find('list');
		$dancestyles = $this->Estudy->Dancestyle->find('list');
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
		return $this->Estudy->find('all', $options);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Estudy->recursive = 0;
		
		$rol = AuthComponent::user('Rol');
		if($rol) {
			# El Admin puede ver todos los elementos, pero un usuario común sólo los propios.
			if($rol['weight'] < User::ADMIN) {
				$this->Paginator->settings = array(
					'conditions' => array('Estudy.user_id' => AuthComponent::user('id')),
				);
			}
			$this->set('estudies', $this->Paginator->paginate());
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
// 		$this->Estudy->recursive = 0;
// 		$this->set('estudies', $this->Paginator->paginate());
// 	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Estudy->exists($id)) {
			throw new NotFoundException(__('Invalid estudy'));
		}
		$options = array('conditions' => array('Estudy.' . $this->Estudy->primaryKey => $id));
		$this->set('estudy', $this->Estudy->find('first', $options));
	}

// /**
//  * add method
//  *
//  * @return void
//  */
// 	public function add() {
// 		if ($this->request->is('post')) {
// 			$this->Estudy->create();
// 			if ($this->Estudy->save($this->request->data)) {
// 				$this->Session->setFlash(__('The estudy has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The estudy could not be saved. Please, try again.'));
// 			}
// 		}
// 		$states = $this->Estudy->State->find('list');
// 		$users = $this->Estudy->User->find('list');
// 		$dancestyles = $this->Estudy->Dancestyle->find('list');
// 		$this->set(compact('states', 'users', 'dancestyles'));
// 	}

// /**
//  * edit method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function edit($id = null) {
// 		if (!$this->Estudy->exists($id)) {
// 			throw new NotFoundException(__('Invalid estudy'));
// 		}
// 		if ($this->request->is(array('post', 'put'))) {
// 			if ($this->Estudy->save($this->request->data)) {
// 				$this->Session->setFlash(__('The estudy has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The estudy could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('Estudy.' . $this->Estudy->primaryKey => $id));
// 			$this->request->data = $this->Estudy->find('first', $options);
// 		}
// 		$states = $this->Estudy->State->find('list');
// 		$users = $this->Estudy->User->find('list');
// 		$dancestyles = $this->Estudy->Dancestyle->find('list');
// 		$this->set(compact('states', 'users', 'dancestyles'));
// 	}

// /**
//  * delete method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function delete($id = null) {
// 		$this->Estudy->id = $id;
// 		if (!$this->Estudy->exists()) {
// 			throw new NotFoundException(__('Invalid estudy'));
// 		}
// 		$this->request->onlyAllow('post', 'delete');
// 		if ($this->Estudy->delete()) {
// 			$this->Session->setFlash(__('The estudy has been deleted.'));
// 		} else {
// 			$this->Session->setFlash(__('The estudy could not be deleted. Please, try again.'));
// 		}
// 		return $this->redirect(array('action' => 'index'));
// 	}

}
