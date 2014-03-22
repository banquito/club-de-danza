<?php
App::uses('AppController', 'Controller');
/**
 * Calls Controller
 *
 * @property Call $Call
 * @property PaginatorComponent $Paginator
 */
class CallsController extends AppController {

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
		$this->Auth->allow('getElements', 'getElementsOutOfDate', 'getSalients', 'view');
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
			if ($this->Call->isOwnedBy($elementId, $user['id'])) {
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
			$call = $this->request->data;

			# Se setea el usuario creador de la nota = usuario logeado
			$call['Call']['user_id'] = AuthComponent::user('id');

			if(isset($call['Call']['element-date']) && !empty($call['Call']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $call['Call']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($call['Call']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$call['Call']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($call['Call']['inscription-start']) && !empty($call['Call']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $call['Call']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($call['Call']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$call['Call']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($call['Call']['inscription-end']) && !empty($call['Call']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $call['Call']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($call['Call']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$call['Call']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($call['Call']['image']['name']) && ($call['Call']['image']['name'] != '')) {
				$imageName = $call['Call']['image']['name'];
				$uploadDir = IMAGES_URL . 'calls/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($call['Call']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $call));
				}
				
				$image = $imageName;
			}


			$call['Call']['image'] = $image;

			$this->Call->create();
			if ($this->Call->save($call)) {
				$call_id = $this->Call->id;

				# Attachments
				if (isset($call['Attachment']) && sizeof($call['Attachment']) > 0) {
				 	foreach ($call['Attachment'] as $key => $attachment) {
						
						# Se verifica si se subió una attachment y se setea la attachment
						if (isset($attachment['name']) && ($attachment['name'] != '')) {
							$attachmentName = $attachment['name'];
							$attachmentExt = pathinfo($attachment['name']);
							$attachmentExt = $attachmentExt['extension'];
							$attachmentFile = $call_id . date("YmdHisu")  . '.' . $attachmentExt;
							$uploadDir = WWW_ROOT . 'files' . DS . 'attachments' . DS;
							$uploadFile = $uploadDir . $attachmentFile;
							
							if (move_uploaded_file($attachment['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Call->Attachment->create();
								if ($this->Call->Attachment->save(array('file'=>$attachmentFile, 'name'=>$attachmentName))) {
									$this->Call->AttachmentsCall->create();
									$this->Call->AttachmentsCall->save(array('call_id'=>$this->Call->id
										, 'attachment_id' => $this->Call->Attachment->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}
			
				# Videos
				if (isset($call['Video']) && sizeof($call['Video']) > 0) {
				 	foreach ($call['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Call->Video->create();
					 		if ($this->Call->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Call->CallsVideo->create();
					 			$this->Call->CallsVideo->save(array('call_id' => $call_id
									, 'video_id' => $this->Call->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}

				$this->Session->setFlash(__('The call has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The call could not be saved. Please, try again.'));
			}
		}
		$states = $this->Call->State->find('list');
		$users = $this->Call->User->find('list');
		$dancestyles = $this->Call->Dancestyle->find('list');
		$professions = $this->Call->Profession->find('list');
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
		$this->Call->id = $id;
		if (!$this->Call->exists()) {
			throw new NotFoundException(__('Invalid call'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Call->delete()) {
			$this->Session->setFlash(__('The call has been deleted.'));
		} else {
			$this->Session->setFlash(__('The call could not be deleted. Please, try again.'));
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
		if (!$this->Call->exists($id)) {
			throw new NotFoundException(__('Invalid call'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$call = $this->request->data;

			if(isset($call['Call']['element-date']) && !empty($call['Call']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $call['Call']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($call['Call']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$call['Call']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($call['Call']['inscription-start']) && !empty($call['Call']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $call['Call']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($call['Call']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$call['Call']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($call['Call']['inscription-end']) && !empty($call['Call']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $call['Call']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($call['Call']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$call['Call']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($call['Call']['image']['name']) 
					&& ($call['Call']['image']['name'] != '')
					&& isset($call['Call']['image']['tmp_name'])
					&& ($call['Call']['image']['tmp_name'] != '')) {
				
				$imageName = $call['Call']['image']['name'];
				$uploadDir = IMAGES_URL . 'calls/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($call['Call']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $call));
				}
				
				$call['Call']['image'] = $imageName;

			} else {
				$call['Call']['image'] = $this -> Call -> field('image', array('id'=>$id));
			}


			# Para que no se eliminen los Videos en el save:
			$callAux['Video'] = $call['Video'];
			$call['Video'] = '';
			$attachments = $this -> Call -> read(null, $id);
			$call['Attachment'] = array_merge($call['Attachment'], $attachments['Attachment']);

			if ($this->Call->save($call)) {
				$call_id = $this->Call->id;
				
				# Attachments
				if (isset($call['Attachment']) && sizeof($call['Attachment']) > 0) {
				 	foreach ($call['Attachment'] as $key => $attachment) {
						
						# Se verifica si se subió una attachment y se setea la attachment
						// if (isset($attachment['name']) && ($attachment['name'] != '')) {
						if (isset($attachment['name']) && ($attachment['name'] != '') && isset($attachment['tmp_name']) && ($attachment['tmp_name'] != '')) {
							$attachmentName = $attachment['name'];
							$attachmentExt = pathinfo($attachment['name']);
							$attachmentExt = $attachmentExt['extension'];
							$attachmentFile = $call_id . date("YmdHisu")  . '.' . $attachmentExt;
							$uploadDir = WWW_ROOT . 'files' . DS . 'attachments' . DS;
							$uploadFile = $uploadDir . $attachmentFile;
							
							if (move_uploaded_file($attachment['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Call->Attachment->create();
								if ($this->Call->Attachment->save(array('file'=>$attachmentFile, 'name'=>$attachmentName))) {
									$this->Call->AttachmentsCall->create();
									$this->Call->AttachmentsCall->save(array('call_id'=>$this->Call->id
										, 'attachment_id' => $this->Call->Attachment->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}

				# Videos
				if (isset($callAux['Video']) && sizeof($callAux['Video']) > 0) {
				 	foreach ($callAux['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Call->Video->create();
					 		if ($this->Call->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Call->CallsVideo->create();
					 			$this->Call->CallsVideo->save(array('call_id' => $call_id
									, 'video_id' => $this->Call->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}
				
				$this->Session->setFlash(__('The call has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The call could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Call.' . $this->Call->primaryKey => $id));
			$this->request->data = $this->Call->find('first', $options);
		}
		$states = $this->Call->State->find('list');
		$users = $this->Call->User->find('list');
		$dancestyles = $this->Call->Dancestyle->find('list');
		$professions = $this->Call->Profession->find('list');
		$this->set(compact('states', 'users', 'dancestyles', 'professions'));
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
		return $this->Call->find('all', $options);
	}
	
/**
 * getElementsOutOfDate method (No Vigentes)
 *
 * @return void
 */
	public function getElementsOutOfDate() {
		$options['conditions'] = array('element-date <' => date('Y-m-d H:i'));
		$options['fields'] = array('id', 'title', 'image', 'element-date');
		$options['order'] = 'element-date ASC';
		$options['recursive'] = -1;
		return $this->Call->find('all', $options);
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
		return $this->Call->find('all', $options);
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Call->recursive = 0;
		
		$rol = AuthComponent::user('Rol');
		if($rol) {
			# El Admin puede ver todos los elementos, pero un usuario común sólo los propios.
			if($rol['weight'] < User::ADMIN) {
				$this->Paginator->settings = array(
					'conditions' => array('Call.user_id' => AuthComponent::user('id')),
				);
			}
			$this->set('calls', $this->Paginator->paginate());
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
		if (!$this->Call->exists($id)) {
			throw new NotFoundException(__('Invalid call'));
		}
		$options = array('conditions' => array('Call.' . $this->Call->primaryKey => $id));
		$this->set('call', $this->Call->find('first', $options));
	}

}
