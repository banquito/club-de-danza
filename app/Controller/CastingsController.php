<?php
App::uses('AppController', 'Controller');
/**
 * Castings Controller
 *
 * @property Casting $Casting
 * @property PaginatorComponent $Paginator
 */
class CastingsController extends AppController {

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
			if ($this->Casting->isOwnedBy($elementId, $user['id'])) {
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
			$casting = $this->request->data;

			# Se setea el usuario creador de la nota = usuario logeado
			$casting['Casting']['user_id'] = AuthComponent::user('id');

			if(isset($casting['Casting']['element-date']) && !empty($casting['Casting']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $casting['Casting']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($casting['Casting']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$casting['Casting']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($casting['Casting']['inscription-start']) && !empty($casting['Casting']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $casting['Casting']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($casting['Casting']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$casting['Casting']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($casting['Casting']['inscription-end']) && !empty($casting['Casting']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $casting['Casting']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($casting['Casting']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$casting['Casting']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($casting['Casting']['image']['name']) && ($casting['Casting']['image']['name'] != '')) {
				$imageName = $casting['Casting']['image']['name'];
				$uploadDir = IMAGES_URL . 'castings/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($casting['Casting']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $casting));
				}
				
				$image = $imageName;
			}


			$casting['Casting']['image'] = $image;

			$this->Casting->create();
			if ($this->Casting->save($casting)) {
				$casting_id = $this->Casting->id;

				# Attachments
				if (isset($casting['Attachment']) && sizeof($casting['Attachment']) > 0) {
				 	foreach ($casting['Attachment'] as $key => $attachment) {
						
						# Se verifica si se subió una attachment y se setea la attachment
						if (isset($attachment['name']) && ($attachment['name'] != '')) {
							$attachmentName = $attachment['name'];
							$attachmentExt = pathinfo($attachment['name']);
							$attachmentExt = $attachmentExt['extension'];
							$attachmentFile = $casting_id . date("YmdHisu")  . '.' . $attachmentExt;
							$uploadDir = WWW_ROOT . 'files' . DS . 'attachments' . DS;
							$uploadFile = $uploadDir . $attachmentFile;
							
							if (move_uploaded_file($attachment['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Casting->Attachment->create();
								if ($this->Casting->Attachment->save(array('file'=>$attachmentFile, 'name'=>$attachmentName))) {
									$this->Casting->AttachmentsCasting->create();
									$this->Casting->AttachmentsCasting->save(array('casting_id'=>$this->Casting->id
										, 'attachment_id' => $this->Casting->Attachment->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}
				
				# Videos
				if (isset($casting['Video']) && sizeof($casting['Video']) > 0) {
				 	foreach ($casting['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Casting->Video->create();
					 		if ($this->Casting->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Casting->CastingsVideo->create();
					 			$this->Casting->CastingsVideo->save(array('casting_id' => $casting_id
									, 'video_id' => $this->Casting->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}

				$this->Session->setFlash(__('The casting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casting could not be saved. Please, try again.'));
			}
		}
		$states = $this->Casting->State->find('list');
		$dancestyles = $this->Casting->Dancestyle->find('list');
		$professions = $this->Casting->Profession->find('list');
		$this->set(compact('states', 'dancestyles', 'professions'));
	}


/**
 * getElements method
 *
 * @return void
 */
	public function getElements() {
		$options['conditions'] = array('element-date >=' => date('Y-m-d H:i'));
		$options['fields'] = array('id', 'title', 'image', 'element-date');
		$options['order'] = 'element-date ASC';
		$options['recursive'] = -1;
		return $this->Casting->find('all', $options);
	}

/**
 * getSalients method
 *
 * @return void
 */
	public function getSalients() {
		$options['conditions'] = array('salient' => true);
		$options['fields'] = array('id', 'title', 'image');
		$options['order'] = array('created' => 'DESC');
		$options['recursive'] = -1;
		return $this->Casting->find('all', $options);
	}



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Casting->recursive = 0;
		
		$rol = AuthComponent::user('Rol');
		if($rol) {
			# El Admin puede ver todos los elementos, pero un usuario común sólo los propios.
			if($rol['weight'] < User::ADMIN) {
				$this->Paginator->settings = array(
					'conditions' => array('Casting.user_id' => AuthComponent::user('id')),
				);
			}
			$this->set('castings', $this->Paginator->paginate());
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
// 		$this->Casting->recursive = 0;
// 		$this->set('castings', $this->Paginator->paginate());
// 	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Casting->exists($id)) {
			throw new NotFoundException(__('Invalid casting'));
		}
		$options = array('conditions' => array('Casting.' . $this->Casting->primaryKey => $id));
		$this->set('casting', $this->Casting->find('first', $options));
	}

// /**
//  * add method
//  *
//  * @return void
//  */
// 	public function add() {
// 		if ($this->request->is('post')) {
// 			$this->Casting->create();
// 			if ($this->Casting->save($this->request->data)) {
// 				$this->Session->setFlash(__('The casting has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The casting could not be saved. Please, try again.'));
// 			}
// 		}
// 		$states = $this->Casting->State->find('list');
// 		$users = $this->Casting->User->find('list');
// 		$dancestyles = $this->Casting->Dancestyle->find('list');
// 		$professions = $this->Casting->Profession->find('list');
// 		$this->set(compact('states', 'users', 'dancestyles', 'professions'));
// 	}

// /**
//  * edit method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function edit($id = null) {
// 		if (!$this->Casting->exists($id)) {
// 			throw new NotFoundException(__('Invalid casting'));
// 		}
// 		if ($this->request->is(array('post', 'put'))) {
// 			if ($this->Casting->save($this->request->data)) {
// 				$this->Session->setFlash(__('The casting has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The casting could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('Casting.' . $this->Casting->primaryKey => $id));
// 			$this->request->data = $this->Casting->find('first', $options);
// 		}
// 		$states = $this->Casting->State->find('list');
// 		$users = $this->Casting->User->find('list');
// 		$dancestyles = $this->Casting->Dancestyle->find('list');
// 		$professions = $this->Casting->Profession->find('list');
// 		$this->set(compact('states', 'users', 'dancestyles', 'professions'));
// 	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Casting->exists($id)) {
			throw new NotFoundException(__('Invalid casting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$casting = $this->request->data;

			if(isset($casting['Casting']['element-date']) && !empty($casting['Casting']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $casting['Casting']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($casting['Casting']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$casting['Casting']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($casting['Casting']['inscription-start']) && !empty($casting['Casting']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $casting['Casting']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($casting['Casting']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$casting['Casting']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($casting['Casting']['inscription-end']) && !empty($casting['Casting']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $casting['Casting']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($casting['Casting']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$casting['Casting']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($casting['Casting']['image']['name']) 
					&& ($casting['Casting']['image']['name'] != '')
					&& isset($casting['Casting']['image']['tmp_name'])
					&& ($casting['Casting']['image']['tmp_name'] != '')) {
				
				$imageName = $casting['Casting']['image']['name'];
				$uploadDir = IMAGES_URL . 'castings/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($casting['Casting']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $casting));
				}
				
				$casting['Casting']['image'] = $imageName;

			} else {
				$casting['Casting']['image'] = $this -> Casting -> field('image', array('id'=>$id));
			}

			# Para que no se eliminen los Videos en el save:
			$castingAux['Video'] = $casting['Video'];
			$casting['Video'] = '';
			$attachments = $this -> Casting -> read(null, $id);
			$casting['Attachment'] = array_merge($casting['Attachment'], $attachments['Attachment']);


			if ($this->Casting->save($casting)) {
				$casting_id = $this->Casting->id;
				
				# Attachments
				if (isset($casting['Attachment']) && sizeof($casting['Attachment']) > 0) {
				 	foreach ($casting['Attachment'] as $key => $attachment) {
						
						# Se verifica si se subió una attachment y se setea la attachment
						// if (isset($attachment['name']) && ($attachment['name'] != '')) {
						if (isset($attachment['name']) && ($attachment['name'] != '') && isset($attachment['tmp_name']) && ($attachment['tmp_name'] != '')) {
							$attachmentName = $attachment['name'];
							$attachmentExt = pathinfo($attachment['name']);
							$attachmentExt = $attachmentExt['extension'];
							$attachmentFile = $casting_id . date("YmdHisu")  . '.' . $attachmentExt;
							$uploadDir = WWW_ROOT . 'files' . DS . 'attachments' . DS;
							$uploadFile = $uploadDir . $attachmentFile;
							
							if (move_uploaded_file($attachment['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Casting->Attachment->create();
								if ($this->Casting->Attachment->save(array('file'=>$attachmentFile, 'name'=>$attachmentName))) {
									$this->Casting->AttachmentsCasting->create();
									$this->Casting->AttachmentsCasting->save(array('casting_id'=>$this->Casting->id
										, 'attachment_id' => $this->Casting->Attachment->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}

				# Videos
				if (isset($castingAux['Video']) && sizeof($castingAux['Video']) > 0) {
				 	foreach ($castingAux['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Casting->Video->create();
					 		if ($this->Casting->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Casting->CastingsVideo->create();
					 			$this->Casting->CastingsVideo->save(array('casting_id' => $casting_id
									, 'video_id' => $this->Casting->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}
				
				$this->Session->setFlash(__('The casting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Casting.' . $this->Casting->primaryKey => $id));
			$this->request->data = $this->Casting->find('first', $options);
		}
		$states = $this->Casting->State->find('list');
		$users = $this->Casting->User->find('list');
		$dancestyles = $this->Casting->Dancestyle->find('list');
		$professions = $this->Casting->Profession->find('list');
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
		$this->Casting->id = $id;
		if (!$this->Casting->exists()) {
			throw new NotFoundException(__('Invalid casting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Casting->delete()) {
			$this->Session->setFlash(__('The casting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The casting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
