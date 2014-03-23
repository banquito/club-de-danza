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
				$practiceroom_id = $this->Practiceroom->id;
				
				# Timetables
				if (isset($practiceroom['Timetable']) && sizeof($practiceroom['Timetable']) > 0) {
				 	foreach ($practiceroom['Timetable'] as $key => $timetable) {
						
						# Se verifica si se subió una timetable y se setea la timetable
						if (isset($timetable['name']) && ($timetable['name'] != '')) {
							$timetableName = $timetable['name'];
							$timetableExt = pathinfo($timetable['name']);
							$timetableExt = $timetableExt['extension'];
							$timetableFile = $practiceroom_id . date("YmdHisu")  . '.' . $timetableExt;
							$uploadDir = IMAGES_URL . 'timetables/';
							$uploadFile = $uploadDir . $timetableFile;
							
							if (move_uploaded_file($timetable['tmp_name'], $uploadFile)) {
						 		# Se crea la relación
						 		$this->Practiceroom->Timetable->create();
								if ($this->Practiceroom->Timetable->save(array('file' => $timetableFile, 'name' => $timetableName))) {
									$this->Practiceroom->PracticeroomsTimetable->create();
									$this->Practiceroom->PracticeroomsTimetable->save(array('practiceroom_id' => $practiceroom_id
										, 'timetable_id' => $this->Practiceroom->Timetable->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
				 	}
				}

				# Photos
				if (isset($practiceroom['Photo']) && sizeof($practiceroom['Photo']) > 0) {
				 	foreach ($practiceroom['Photo'] as $key => $photo) {
						
						# Se verifica si se subió una photo y se setea la photo
						if (isset($photo['name']) && ($photo['name'] != '')) {
							$photoName = $photo['name'];
							$photoExt = pathinfo($photo['name']);
							$photoExt = $photoExt['extension'];
							//$photoFile = $practiceroom_id . date("YmdHisu")  . '.' . $photoExt;
							$photoFile = $practiceroom_id . md5(microtime()) . '.' . $photoExt; 
							$uploadDir = IMAGES_URL . 'photos/';
							$uploadFile = $uploadDir . $photoFile;
							
							if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Practiceroom->Photo->create();
								if ($this->Practiceroom->Photo->save(array('file'=>$photoFile, 'name'=>$photoName))) {
									$this->Practiceroom->PracticeroomsPhoto->create();
									$this->Practiceroom->PracticeroomsPhoto->save(array('practiceroom_id'=>$this->Practiceroom->id
										, 'photo_id' => $this->Practiceroom->Photo->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}

				# Videos
				if (isset($practiceroom['Video']) && sizeof($practiceroom['Video']) > 0) {
				 	foreach ($practiceroom['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Practiceroom->Video->create();
					 		if ($this->Practiceroom->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Practiceroom->PracticeroomsVideo->create();
					 			$this->Practiceroom->PracticeroomsVideo->save(array('practiceroom_id' => $practiceroom_id
									, 'video_id' => $this->Practiceroom->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}

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

			# Para que no se eliminen los Timetables en el save:
			$practiceroomAux = $this -> Practiceroom -> read(null, $id);
			$practiceroom['Timetable'] = array_merge($practiceroom['Timetable'], $practiceroomAux['Timetable']);
			// $practiceroom['Video'] = array_merge($practiceroom['Video'], $practiceroomAux['Video']);

			// debug($practiceroom, $showHtml = null, $showFrom = true);
			# Para que no se eliminen las Photos en el save:
			$photos = $this -> Practiceroom -> read(null, $id);
			$practiceroom['Photo'] = array_merge($practiceroom['Photo'], $photos['Photo']);

			if ($this->Practiceroom->save($practiceroom)) {
				$practiceroom_id = $this->Practiceroom->id;

				if (isset($practiceroom['Timetable']) && sizeof($practiceroom['Timetable']) > 0) {
				 	foreach ($practiceroom['Timetable'] as $key => $timetable) {
						
						# Se verifica si se subió una timetable y se setea la timetable
						if (isset($timetable['name']) && ($timetable['name'] != '') && isset($timetable['tmp_name']) && ($timetable['tmp_name'] != '')) {
							$timetableName = $timetable['name'];
							$timetableExt = pathinfo($timetable['name']);
							$timetableExt = $timetableExt['extension'];
							$timetableFile = $practiceroom_id . date("YmdHisu")  . '.' . $timetableExt;
							$uploadDir = IMAGES_URL . 'timetables/';
							$uploadFile = $uploadDir . $timetableFile;
							
							if (move_uploaded_file($timetable['tmp_name'], $uploadFile)) {
								// $this -> Session -> setFlash(__('The timetable could not be saved. Please, verify the file.'));
								// return $this -> redirect(array('action' => 'add', $practiceroom));
						 		
						 		# Se crea la relación
						 		$this->Practiceroom->Timetable->create();
								if ($this->Practiceroom->Timetable->save(array('file'=>$timetableFile, 'name'=>$timetableName))) {
									$this->Practiceroom->PracticeroomsTimetable->create();
									$this->Practiceroom->PracticeroomsTimetable->save(array('practiceroom_id' => $practiceroom_id
										, 'timetable_id' => $this->Practiceroom->Timetable->id
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
				if (isset($practiceroom['Video']) && sizeof($practiceroom['Video']) > 0) {
				 	foreach ($practiceroom['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Practiceroom->Video->create();
					 		if ($this->Practiceroom->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Practiceroom->PracticeroomsVideo->create();
					 			$this->Practiceroom->PracticeroomsVideo->save(array('practiceroom_id' => $practiceroom_id
									, 'video_id' => $this->Practiceroom->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}

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
 * getSalients method
 *
 * @return void
 */
	public function getSalients() {
		$options['conditions'] = array('salient' => true);
		$options['fields'] = array('id', 'name', 'image');
		$options['order'] = array('created' => 'DESC');
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
		$this->layout = 'mapadeladanza';
		
		$options = array('conditions' => array('Practiceroom.' . $this->Practiceroom->primaryKey => $id));
		$this->set('practiceroom', $this->Practiceroom->find('first', $options));
		// $this->set('timetables', $this->Practiceroom->Timetable->find('list'));
	}

}
