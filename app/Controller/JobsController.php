<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 * @property PaginatorComponent $Paginator
 */
class JobsController extends AppController {

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
			if ($this->Job->isOwnedBy($elementId, $user['id'])) {
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
			$job = $this->request->data;

			# Se setea el usuario creador de la nota = usuario logeado
			$job['Job']['user_id'] = AuthComponent::user('id');

			if(isset($job['Job']['element-date']) && !empty($job['Job']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $job['Job']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($job['Job']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$job['Job']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($job['Job']['inscription-start']) && !empty($job['Job']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $job['Job']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($job['Job']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$job['Job']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($job['Job']['inscription-end']) && !empty($job['Job']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $job['Job']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($job['Job']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$job['Job']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($job['Job']['image']['name']) && ($job['Job']['image']['name'] != '')) {
				$imageName = $job['Job']['image']['name'];
				$uploadDir = IMAGES_URL . 'jobs/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($job['Job']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $job));
				}
				
				$image = $imageName;
			}


			$job['Job']['image'] = $image;

			$this->Job->create();
			if ($this->Job->save($job)) {
				$job_id = $this->Job->id;
				
				# Attachments
				if (isset($job['Attachment']) && sizeof($job['Attachment']) > 0) {
				 	foreach ($job['Attachment'] as $key => $attachment) {
						
						# Se verifica si se subió una attachment y se setea la attachment
						if (isset($attachment['name']) && ($attachment['name'] != '')) {
							$attachmentName = $attachment['name'];
							$attachmentExt = pathinfo($attachment['name']);
							$attachmentExt = $attachmentExt['extension'];
							$attachmentFile = $job_id . date("YmdHisu")  . '.' . $attachmentExt;
							$uploadDir = WWW_ROOT . 'files' . DS . 'attachments' . DS;
							$uploadFile = $uploadDir . $attachmentFile;
							
							if (move_uploaded_file($attachment['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Job->Attachment->create();
								if ($this->Job->Attachment->save(array('file'=>$attachmentFile, 'name'=>$attachmentName))) {
									$this->Job->AttachmentsJob->create();
									$this->Job->AttachmentsJob->save(array('job_id'=>$this->Job->id
										, 'attachment_id' => $this->Job->Attachment->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}
				
				# Photos
				if (isset($job['Photo']) && sizeof($job['Photo']) > 0) {
				 	foreach ($job['Photo'] as $key => $photo) {
						
						# Se verifica si se subió una photo y se setea la photo
						if (isset($photo['name']) && ($photo['name'] != '')) {
							$photoName = $photo['name'];
							$photoExt = pathinfo($photo['name']);
							$photoExt = $photoExt['extension'];
							//$photoFile = $job_id . date("YmdHisu")  . '.' . $photoExt;
							$photoFile = $job_id . md5(microtime()) . '.' . $photoExt; 
							$uploadDir = IMAGES_URL . 'photos/';
							$uploadFile = $uploadDir . $photoFile;
							
							if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Job->Photo->create();
								if ($this->Job->Photo->save(array('file'=>$photoFile, 'name'=>$photoName))) {
									$this->Job->JobsPhoto->create();
									$this->Job->JobsPhoto->save(array('job_id'=>$this->Job->id
										, 'photo_id' => $this->Job->Photo->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}
				
				# Videos
				if (isset($job['Video']) && sizeof($job['Video']) > 0) {
				 	foreach ($job['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Job->Video->create();
					 		if ($this->Job->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Job->JobsVideo->create();
					 			$this->Job->JobsVideo->save(array('job_id' => $job_id
									, 'video_id' => $this->Job->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}

				$this->Session->setFlash(__('The job has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job could not be saved. Please, try again.'));
			}
		}
		$states = $this->Job->State->find('list');
		$users = $this->Job->User->find('list');
		$dancestyles = $this->Job->Dancestyle->find('list');
		$professions = $this->Job->Profession->find('list');
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
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Invalid job'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Job->delete()) {
			$this->Session->setFlash(__('The job has been deleted.'));
		} else {
			$this->Session->setFlash(__('The job could not be deleted. Please, try again.'));
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
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Invalid job'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$job = $this->request->data;

			if(isset($job['Job']['element-date']) && !empty($job['Job']['element-date'])):
				// $element-date = DateTime::createFromFormat('d/m/Y', $job['Job']['element-date']); # PHP >= 5.3
				# PHP 5.2
				$elementDate = strptime($job['Job']['element-date'], '%d/%m/%Y %H:%M');
				$elementDate = sprintf('%04d-%02d-%02d %02d:%02d', $elementDate['tm_year'] + 1900, $elementDate['tm_mon'] + 1, $elementDate['tm_mday'], $elementDate['tm_hour'], $elementDate['tm_min']);
				$elementDate = new DateTime($elementDate);
				$job['Job']['element-date'] = $elementDate->format('Y-m-d H:i:s');
			endif;
			if(isset($job['Job']['inscription-start']) && !empty($job['Job']['inscription-start'])):
				// $inscription-start = DateTime::createFromFormat('d/m/Y', $job['Job']['inscription-start']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionStart = strptime($job['Job']['inscription-start'], '%d/%m/%Y %H:%M');
				$inscriptionStart = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionStart['tm_year'] + 1900, $inscriptionStart['tm_mon'] + 1, $inscriptionStart['tm_mday'], $inscriptionStart['tm_hour'], $inscriptionStart['tm_min']);
				$inscriptionStart = new DateTime($inscriptionStart);
				$job['Job']['inscription-start'] = $inscriptionStart->format('Y-m-d H:i:s');
			endif;
			if(isset($job['Job']['inscription-end']) && !empty($job['Job']['inscription-end'])):
				// $inscription-end = DateTime::createFromFormat('d/m/Y', $job['Job']['inscription-end']); # PHP >= 5.3
				# PHP 5.2
				$inscriptionEnd = strptime($job['Job']['inscription-end'], '%d/%m/%Y %H:%M');
				$inscriptionEnd = sprintf('%04d-%02d-%02d %02d:%02d', $inscriptionEnd['tm_year'] + 1900, $inscriptionEnd['tm_mon'] + 1, $inscriptionEnd['tm_mday'], $inscriptionEnd['tm_hour'], $inscriptionEnd['tm_min']);
				$inscriptionEnd = new DateTime($inscriptionEnd);
				$job['Job']['inscription-end'] = $inscriptionEnd->format('Y-m-d H:i:s');
			endif;

			# Se verifica si se subió una imagen y se setea la imagen
			if (isset($job['Job']['image']['name']) 
					&& ($job['Job']['image']['name'] != '')
					&& isset($job['Job']['image']['tmp_name'])
					&& ($job['Job']['image']['tmp_name'] != '')) {
				
				$imageName = $job['Job']['image']['name'];
				$uploadDir = IMAGES_URL . 'jobs/';
				$uploadFile = $uploadDir . $imageName;
				
				if (!move_uploaded_file($job['Job']['image']['tmp_name'], $uploadFile)) {
					$this -> Session -> setFlash(__('The image could not be saved. Please, verify the file.'));
					return $this -> redirect(array('action' => 'add', $job));
				}
				
				$job['Job']['image'] = $imageName;

			} else {
				$job['Job']['image'] = $this -> Job -> field('image', array('id'=>$id));
			}


			# Para que no se eliminen los Videos en el save:
			$jobAux['Video'] = $job['Video'];
			$job['Video'] = '';
			$attachments = $this -> Job -> read(null, $id);
			$job['Attachment'] = array_merge($job['Attachment'], $attachments['Attachment']);

			# Para que no se eliminen las Photos en el save:
			$photos = $this -> Job -> read(null, $id);
			$job['Photo'] = array_merge($job['Photo'], $photos['Photo']);

			if ($this->Job->save($job)) {
				$job_id = $this->Job->id;
				
				# Attachments
				if (isset($job['Attachment']) && sizeof($job['Attachment']) > 0) {
				 	foreach ($job['Attachment'] as $key => $attachment) {
						
						# Se verifica si se subió una attachment y se setea la attachment
						// if (isset($attachment['name']) && ($attachment['name'] != '')) {
						if (isset($attachment['name']) && ($attachment['name'] != '') && isset($attachment['tmp_name']) && ($attachment['tmp_name'] != '')) {
							$attachmentName = $attachment['name'];
							$attachmentExt = pathinfo($attachment['name']);
							$attachmentExt = $attachmentExt['extension'];
							$attachmentFile = $job_id . date("YmdHisu")  . '.' . $attachmentExt;
							$uploadDir = WWW_ROOT . 'files' . DS . 'attachments' . DS;
							$uploadFile = $uploadDir . $attachmentFile;
							
							if (move_uploaded_file($attachment['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Job->Attachment->create();
								if ($this->Job->Attachment->save(array('file'=>$attachmentFile, 'name'=>$attachmentName))) {
									$this->Job->AttachmentsJob->create();
									$this->Job->AttachmentsJob->save(array('job_id'=>$this->Job->id
										, 'attachment_id' => $this->Job->Attachment->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}

				# Photos
				if (isset($job['Photo']) && sizeof($job['Photo']) > 0) {
				 	foreach ($job['Photo'] as $key => $photo) {
						
						# Se verifica si se subió una photo y se setea la photo
						if (isset($photo['name']) && ($photo['name'] != '') && isset($photo['tmp_name']) && ($photo['tmp_name'] != '')) {
							$photoName = $photo['name'];
							$photoExt = pathinfo($photo['name']);
							$photoExt = $photoExt['extension'];
							$photoFile = $job_id . md5(microtime()) . '.' . $photoExt;
							$uploadDir = IMAGES_URL . 'photos/';
							$uploadFile = $uploadDir . $photoFile;
							
							if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
						 		# Se crea la relación
						 		$this->Job->Photo->create();
								if ($this->Job->Photo->save(array('file'=>$photoFile, 'name'=>$photoName))) {
									$this->Job->JobsPhoto->create();
									$this->Job->JobsPhoto->save(array('job_id' => $job_id
										, 'photo_id' => $this->Job->Photo->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
							
						}
				 	}
				}

				# Videos
				if (isset($jobAux['Video']) && sizeof($jobAux['Video']) > 0) {
				 	foreach ($jobAux['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Job->Video->create();
					 		if ($this->Job->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Job->JobsVideo->create();
					 			$this->Job->JobsVideo->save(array('job_id' => $job_id
									, 'video_id' => $this->Job->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}
				
				$this->Session->setFlash(__('The job has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
			$this->request->data = $this->Job->find('first', $options);
		}
		$states = $this->Job->State->find('list');
		$users = $this->Job->User->find('list');
		$dancestyles = $this->Job->Dancestyle->find('list');
		$professions = $this->Job->Profession->find('list');
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
		return $this->Job->find('all', $options);
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
		return $this->Job->find('all', $options);
	}

/**
 * getSalients method
 *
 * @return void
 */
	public function getSalients() {
		$options['conditions'] = array('salient' => true);
		// $options['fields'] = array('id', 'title', 'image');
		$options['order'] = array('Job.created' => 'DESC');
		// $options['recursive'] = -1;
		return $this->Job->find('all', $options);
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Job->recursive = 0;
		
		$rol = AuthComponent::user('Rol');
		if($rol) {
			# El Admin puede ver todos los elementos, pero un usuario común sólo los propios.
			if($rol['weight'] < User::ADMIN) {
				$this->Paginator->settings = array(
					'conditions' => array('Job.user_id' => AuthComponent::user('id')),
				);
			}
			$this->set('jobs', $this->Paginator->paginate());
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
// 		$this->Job->recursive = 0;
// 		$this->set('jobs', $this->Paginator->paginate());
// 	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Invalid job'));
		}
		$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
		$this->set('job', $this->Job->find('first', $options));
	}

// /**
//  * add method
//  *
//  * @return void
//  */
// 	public function add() {
// 		if ($this->request->is('post')) {
// 			$this->Job->create();
// 			if ($this->Job->save($this->request->data)) {
// 				$this->Session->setFlash(__('The job has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The job could not be saved. Please, try again.'));
// 			}
// 		}
// 		$states = $this->Job->State->find('list');
// 		$users = $this->Job->User->find('list');
// 		$dancestyles = $this->Job->Dancestyle->find('list');
// 		$professions = $this->Job->Profession->find('list');
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
// 		if (!$this->Job->exists($id)) {
// 			throw new NotFoundException(__('Invalid job'));
// 		}
// 		if ($this->request->is(array('post', 'put'))) {
// 			if ($this->Job->save($this->request->data)) {
// 				$this->Session->setFlash(__('The job has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The job could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
// 			$this->request->data = $this->Job->find('first', $options);
// 		}
// 		$states = $this->Job->State->find('list');
// 		$users = $this->Job->User->find('list');
// 		$dancestyles = $this->Job->Dancestyle->find('list');
// 		$professions = $this->Job->Profession->find('list');
// 		$this->set(compact('states', 'users', 'dancestyles', 'professions'));
// 	}

}
