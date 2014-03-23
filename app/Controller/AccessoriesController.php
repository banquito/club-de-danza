<?php
App::uses('AppController', 'Controller');
/**
 * Accessories Controller
 *
 * @property Accessory $Accessory
 * @property PaginatorComponent $Paginator
 */
class AccessoriesController extends AppController {

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
		$this->Auth->allow('getElements', 'getSalients', 'view');
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
			if ($this->Accessory->isOwnedBy($elementId, $user['id'])) {
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
			$accessory = $this->request->data;

			# Se setea el usuario creador de la nota = usuario logeado
			$accessory['Accessory']['user_id'] = AuthComponent::user('id');

			if(isset($accessory['Accessory']['element-date']) && !empty($accessory['Accessory']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $accessory['Accessory']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($accessory['Accessory']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$accessory['Accessory']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($accessory['Accessory']['inscription-start']) && !empty($accessory['Accessory']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $accessory['Accessory']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($accessory['Accessory']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$accessory['Accessory']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($accessory['Accessory']['inscription-end']) && !empty($accessory['Accessory']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $accessory['Accessory']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($accessory['Accessory']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$accessory['Accessory']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($accessory['Accessory']['image']['name']) && ($accessory['Accessory']['image']['name'] != '')) {
				$imageName = $accessory['Accessory']['image']['name'];
				$uploadDir = IMAGES_URL . 'accessories/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($accessory['Accessory']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $accessory));
				}
				
				$image = $imageName;
			}


			$accessory['Accessory']['image'] = $image;

			$this->Accessory->create();
			if ($this->Accessory->save($accessory)) {
				$accessory_id = $this->Accessory->id;
				
				# Photos
				if (isset($accessory['Photo']) && sizeof($accessory['Photo']) > 0) {
				 	foreach ($accessory['Photo'] as $key => $photo) {
						
						# Se verifica si se subió una photo y se setea la photo
						if (isset($photo['name']) && ($photo['name'] != '')) {
							$photoName = $photo['name'];
							$photoExt = pathinfo($photo['name']);
							$photoExt = $photoExt['extension'];
							//$photoFile = $accessory_id . date("YmdHisu")  . '.' . $photoExt;
							$photoFile = $accessory_id . md5(microtime()) . '.' . $photoExt; 
							$uploadDir = IMAGES_URL . 'photos/';
							$uploadFile = $uploadDir . $photoFile;
							
							if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Accessory->Photo->create();
								if ($this->Accessory->Photo->save(array('file'=>$photoFile, 'name'=>$photoName))) {
									$this->Accessory->AccessoriesPhoto->create();
									$this->Accessory->AccessoriesPhoto->save(array('accessory_id'=>$this->Accessory->id
										, 'photo_id' => $this->Accessory->Photo->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}
				
				# Videos
				if (isset($accessory['Video']) && sizeof($accessory['Video']) > 0) {
				 	foreach ($accessory['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Accessory->Video->create();
					 		if ($this->Accessory->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Accessory->AccessoriesVideo->create();
					 			$this->Accessory->AccessoriesVideo->save(array('accessory_id' => $accessory_id
									, 'video_id' => $this->Accessory->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}

				$this->Session->setFlash(__('The accessory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessory could not be saved. Please, try again.'));
			}
		}
		$states = $this->Accessory->State->find('list');
		$dancestyles = $this->Accessory->Dancestyle->find('list');
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
		$this->Accessory->id = $id;
		if (!$this->Accessory->exists()) {
			throw new NotFoundException(__('Invalid accessory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Accessory->delete()) {
			$this->Session->setFlash(__('The accessory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The accessory could not be deleted. Please, try again.'));
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
		if (!$this->Accessory->exists($id)) {
			throw new NotFoundException(__('Invalid accessory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$accessory = $this->request->data;

			// if(isset($accessory['Accessory']['element-date']) && !empty($accessory['Accessory']['element-date'])):
			// 	// $element-date = DateTime::createFromFormat('d/m/Y', $accessory['Accessory']['element-date']); # PHP >= 5.3
			// 	# PHP 5.2
			// 	$elementDate = strptime($accessory['Accessory']['element-date'], '%d/%m/%Y %H:%M');
			// 	$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
			// 	$elementDate = new DateTime($elementDate);
			// 	$accessory['Accessory']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			// endif;
			// if(isset($accessory['Accessory']['inscription-start']) && !empty($accessory['Accessory']['inscription-start'])):
			// 	// $inscription-start = DateTime::createFromFormat('d/m/Y', $accessory['Accessory']['inscription-start']); # PHP >= 5.3
			// 	# PHP 5.2
			// 	$inscriptionStart = strptime($accessory['Accessory']['inscription-start'], '%d/%m/%Y %H:%M');
			// 	$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
			// 	$inscriptionStart = new DateTime($inscriptionStart);
			// 	$accessory['Accessory']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			// endif;
			// if(isset($accessory['Accessory']['inscription-end']) && !empty($accessory['Accessory']['inscription-end'])):
			// 	// $inscription-end = DateTime::createFromFormat('d/m/Y', $accessory['Accessory']['inscription-end']); # PHP >= 5.3
			// 	# PHP 5.2
			// 	$inscriptionEnd = strptime($accessory['Accessory']['inscription-end'], '%d/%m/%Y %H:%M');
			// 	$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
			// 	$inscriptionEnd = new DateTime($inscriptionEnd);
			// 	$accessory['Accessory']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			// endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($accessory['Accessory']['image']['name']) 
					&& ($accessory['Accessory']['image']['name'] != '')
					&& isset($accessory['Accessory']['image']['tmp_name'])
					&& ($accessory['Accessory']['image']['tmp_name'] != '')) {
				
				$imageName = $accessory['Accessory']['image']['name'];
				$uploadDir = IMAGES_URL . 'accessories/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($accessory['Accessory']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $accessory));
				}
				
				$accessory['Accessory']['image'] = $imageName;

			} else {
				$accessory['Accessory']['image'] = $this -> Accessory -> field('image', array('id'=>$id));
			}

			# Para que no se eliminen los Videos en el save:
			$accessoryAux['Video'] = $accessory['Video'];
			$accessory['Video'] = '';

			# Para que no se eliminen las Photos en el save:
			$photos = $this -> Accessory -> read(null, $id);
			$accessory['Photo'] = array_merge($accessory['Photo'], $photos['Photo']);

			if ($this->Accessory->save($accessory)) {
				$accessory_id = $this->Accessory->id;

				# Photos
				if (isset($accessory['Photo']) && sizeof($accessory['Photo']) > 0) {
				 	foreach ($accessory['Photo'] as $key => $photo) {
						
						# Se verifica si se subió una photo y se setea la photo
						if (isset($photo['name']) && ($photo['name'] != '') && isset($photo['tmp_name']) && ($photo['tmp_name'] != '')) {
							$photoName = $photo['name'];
							$photoExt = pathinfo($photo['name']);
							$photoExt = $photoExt['extension'];
							$photoFile = $accessory_id . md5(microtime()) . '.' . $photoExt;
							$uploadDir = IMAGES_URL . 'photos/';
							$uploadFile = $uploadDir . $photoFile;
							
							if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
						 		# Se crea la relación
						 		$this->Accessory->Photo->create();
								if ($this->Accessory->Photo->save(array('file'=>$photoFile, 'name'=>$photoName))) {
									$this->Accessory->AccessoriesPhoto->create();
									$this->Accessory->AccessoriesPhoto->save(array('accessory_id' => $accessory_id
										, 'photo_id' => $this->Accessory->Photo->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
							
						}
				 	}
				}

				# Videos
				if (isset($accessoryAux['Video']) && sizeof($accessoryAux['Video']) > 0) {
				 	foreach ($accessoryAux['Video'] as $key => $video) {
				 		if(isset($video['file']) && $video['file'] != '' && isset($video['name']) && $video['name'] != '') {
					 		debug($video, $showHtml = null, $showFrom = true);

					 		# Se crea la relación
					 		$this->Accessory->Video->create();
					 		if ($this->Accessory->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Accessory->AccessoriesVideo->create();
					 			$this->Accessory->AccessoriesVideo->save(array('accessory_id' => $accessory_id
									, 'video_id' => $this->Accessory->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}


				$this->Session->setFlash(__('The accessory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Accessory.' . $this->Accessory->primaryKey => $id));
			$this->request->data = $this->Accessory->find('first', $options);
		}
		$states = $this->Accessory->State->find('list');
		$dancestyles = $this->Accessory->Dancestyle->find('list');
		$this->set(compact('states', 'users', 'dancestyles'));
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
		return $this->Accessory->find('all', $options);
	}


/**
 * getSalients method
 *
 * @return void
 */
	public function getSalients() {
		$options['conditions'] = array('salient' => true);
		// $options['fields'] = array('id', 'name', 'image', 'products', 'street', 'floor', 'department', 'website', 'email', 'phone');
		$options['order'] = array('Accessory.created' => 'DESC');
		// $options['recursive'] = -1;
		return $this->Accessory->find('all', $options);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Accessory->recursive = 0;
		
		$rol = AuthComponent::user('Rol');
		if($rol) {
			# El Admin puede ver todos los elementos, pero un usuario común sólo los propios.
			if($rol['weight'] < User::ADMIN) {
				$this->Paginator->settings = array(
					'conditions' => array('Accessory.user_id' => AuthComponent::user('id')),
				);
			}
			$this->set('accessories', $this->Paginator->paginate());
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
// 		$this->Accessory->recursive = 0;
// 		$this->set('accessories', $this->Paginator->paginate());
// 	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Accessory->exists($id)) {
			throw new NotFoundException(__('Invalid accessory'));
		}
		$this->layout = 'mapadeladanza';

		$options = array('conditions' => array('Accessory.' . $this->Accessory->primaryKey => $id));
		$this->set('accessory', $this->Accessory->find('first', $options));
	}

// /**
//  * add method
//  *
//  * @return void
//  */
// 	public function add() {
// 		if ($this->request->is('post')) {
// 			$this->Accessory->create();
// 			if ($this->Accessory->save($this->request->data)) {
// 				$this->Session->setFlash(__('The accessory has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The accessory could not be saved. Please, try again.'));
// 			}
// 		}
// 		$states = $this->Accessory->State->find('list');
// 		$users = $this->Accessory->User->find('list');
// 		$dancestyles = $this->Accessory->Dancestyle->find('list');
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
// 		if (!$this->Accessory->exists($id)) {
// 			throw new NotFoundException(__('Invalid accessory'));
// 		}
// 		if ($this->request->is(array('post', 'put'))) {
// 			if ($this->Accessory->save($this->request->data)) {
// 				$this->Session->setFlash(__('The accessory has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The accessory could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('Accessory.' . $this->Accessory->primaryKey => $id));
// 			$this->request->data = $this->Accessory->find('first', $options);
// 		}
// 		$states = $this->Accessory->State->find('list');
// 		$users = $this->Accessory->User->find('list');
// 		$dancestyles = $this->Accessory->Dancestyle->find('list');
// 		$this->set(compact('states', 'users', 'dancestyles'));
// 	}


}
