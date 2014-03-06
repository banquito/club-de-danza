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
			if ($this->Audition->isOwnedBy($elementId, $user['id'])) {
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
			$audition = $this->request->data;

			# Se setea el usuario creador de la nota = usuario logeado
			$audition['Audition']['user_id'] = AuthComponent::user('id');

			if(isset($audition['Audition']['element-date']) && !empty($audition['Audition']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $audition['Audition']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($audition['Audition']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$audition['Audition']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($audition['Audition']['inscription-start']) && !empty($audition['Audition']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $audition['Audition']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($audition['Audition']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$audition['Audition']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($audition['Audition']['inscription-end']) && !empty($audition['Audition']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $audition['Audition']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($audition['Audition']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$audition['Audition']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($audition['Audition']['image']['name']) && ($audition['Audition']['image']['name'] != '')) {
				$imageName = $audition['Audition']['image']['name'];
				$uploadDir = IMAGES_URL . 'auditions/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($audition['Audition']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $audition));
				}
				
				$image = $imageName;
			}


			$audition['Audition']['image'] = $image;

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
			$audition = $this->request->data;

			if(isset($audition['Audition']['element-date']) && !empty($audition['Audition']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $audition['Audition']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($audition['Audition']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$audition['Audition']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($audition['Audition']['inscription-start']) && !empty($audition['Audition']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $audition['Audition']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($audition['Audition']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$audition['Audition']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($audition['Audition']['inscription-end']) && !empty($audition['Audition']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $audition['Audition']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($audition['Audition']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$audition['Audition']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($audition['Audition']['image']['name']) 
					&& ($audition['Audition']['image']['name'] != '')
					&& isset($audition['Audition']['image']['tmp_name'])
					&& ($audition['Audition']['image']['tmp_name'] != '')) {
				
				$imageName = $audition['Audition']['image']['name'];
				$uploadDir = IMAGES_URL . 'auditions/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($audition['Audition']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $audition));
				}
				
				$audition['Audition']['image'] = $imageName;

			} else {
				$audition['Audition']['image'] = $this -> Audition -> field('image', array('id'=>$id));
			}




			if ($this->Audition->save($audition)) {
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
 * getElements method
 *
 * @return void
 */
	public function getElements() {
		$options['conditions'] = array('element-date >=' => date('Y-m-d H:i'));
		$options['fields'] = array('id', 'title', 'image');
		$options['order'] = 'element-date ASC';
		$options['recursive'] = -1;
		return $this->Audition->find('all', $options);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Audition->recursive = 0;

		$rol = AuthComponent::user('Rol');
		if($rol) {
			# El Admin puede ver todos los elementos, pero un usuario común sólo los propios.
			if($rol['weight'] < User::ADMIN) {
				$this->Paginator->settings = array(
					'conditions' => array('Audition.user_id' => AuthComponent::user('id')),
				);
			}
			$this->set('auditions', $this->Paginator->paginate());
		} else {
			$this->redirect('/logout');
		}
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

}