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
				$estudy_id = $this->Estudy->id;
				
				# Photos
				if (isset($estudy['Photo']) && sizeof($estudy['Photo']) > 0) {
				 	foreach ($estudy['Photo'] as $key => $photo) {
						
						# Se verifica si se subió una photo y se setea la photo
						if (isset($photo['name']) && ($photo['name'] != '')) {
							$photoName = $photo['name'];
							$photoExt = pathinfo($photo['name']);
							$photoExt = $photoExt['extension'];
							//$photoFile = $estudy_id . date("YmdHisu")  . '.' . $photoExt;
							$photoFile = $estudy_id . md5(microtime()) . '.' . $photoExt; 
							$uploadDir = IMAGES_URL . 'photos/';
							$uploadFile = $uploadDir . $photoFile;
							
							if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Estudy->Photo->create();
								if ($this->Estudy->Photo->save(array('file'=>$photoFile, 'name'=>$photoName))) {
									$this->Estudy->EstudiesPhoto->create();
									$this->Estudy->EstudiesPhoto->save(array('estudy_id'=>$this->Estudy->id
										, 'photo_id' => $this->Estudy->Photo->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}
				
				# Timetable
				if (isset($estudy['Timetable']) && sizeof($estudy['Timetable']) > 0) {
				 	foreach ($estudy['Timetable'] as $key => $timetable) {
						
						# Se verifica si se subió una timetable y se setea la timetable
						if (isset($timetable['name']) && ($timetable['name'] != '')) {
							$timetableName = $timetable['name'];
							$timetableExt = pathinfo($timetable['name']);
							$timetableExt = $timetableExt['extension'];
							$timetableFile = $estudy_id . date("YmdHisu")  . '.' . $timetableExt;
							$uploadDir = IMAGES_URL . 'timetables/';
							$uploadFile = $uploadDir . $timetableFile;
							
							if (move_uploaded_file($timetable['tmp_name'], $uploadFile)) {
								# Se crea la relación
								$this->Estudy->Timetable->create();
								if ($this->Estudy->Timetable->save(array('file'=>$timetableFile, 'name'=>$timetableName))) {
									$this->Estudy->EstudiesTimetable->create();
									$this->Estudy->EstudiesTimetable->save(array('estudy_id'=>$this->Estudy->id
										, 'timetable_id' => $this->Estudy->Timetable->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
						}
					}
				}

				# Videos
				if (isset($estudy['Video']) && sizeof($estudy['Video']) > 0) {
				 	foreach ($estudy['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Estudy->Video->create();
					 		if ($this->Estudy->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Estudy->EstudiesVideo->create();
					 			$this->Estudy->EstudiesVideo->save(array('estudy_id' => $estudy_id
									, 'video_id' => $this->Estudy->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}

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

			# Para que no se eliminen los Timetables en el save:
			$timetables = $this -> Estudy -> read(null, $id);
			$estudy['Timetable'] = array_merge($estudy['Timetable'], $timetables['Timetable']);

			# Para que no se eliminen las Photos en el save:
			$photos = $this -> Estudy -> read(null, $id);
			$estudy['Photo'] = array_merge($estudy['Photo'], $photos['Photo']);

			if ($this->Estudy->save($estudy)) {
				$estudy_id = $this->Estudy->id;

				# Timetable
				if (isset($estudy['Timetable']) && sizeof($estudy['Timetable']) > 0) {
				 	foreach ($estudy['Timetable'] as $key => $timetable) {
						
						# Se verifica si se subió una timetable y se setea la timetable
						if (isset($timetable['name']) && ($timetable['name'] != '') && isset($timetable['tmp_name']) && ($timetable['tmp_name'] != '')) {
							$timetableName = $timetable['name'];
							$timetableExt = pathinfo($timetable['name']);
							$timetableExt = $timetableExt['extension'];
							$timetableFile = $estudy_id . date("YmdHisu")  . '.' . $timetableExt;
							$uploadDir = IMAGES_URL . 'timetables/';
							$uploadFile = $uploadDir . $timetableFile;
							
							if (move_uploaded_file($timetable['tmp_name'], $uploadFile)) {
						 		# Se crea la relación
						 		$this->Estudy->Timetable->create();
								if ($this->Estudy->Timetable->save(array('file'=>$timetableFile, 'name'=>$timetableName))) {
									$this->Estudy->EstudiesTimetable->create();
									$this->Estudy->EstudiesTimetable->save(array('estudy_id' => $estudy_id
										, 'timetable_id' => $this->Estudy->Timetable->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
							
						}
				 	}
				}
				
				# Photos
				if (isset($estudy['Photo']) && sizeof($estudy['Photo']) > 0) {
				 	foreach ($estudy['Photo'] as $key => $photo) {
						
						# Se verifica si se subió una photo y se setea la photo
						if (isset($photo['name']) && ($photo['name'] != '') && isset($photo['tmp_name']) && ($photo['tmp_name'] != '')) {
							$photoName = $photo['name'];
							$photoExt = pathinfo($photo['name']);
							$photoExt = $photoExt['extension'];
							$photoFile = $estudy_id . md5(microtime()) . '.' . $photoExt;
							$uploadDir = IMAGES_URL . 'photos/';
							$uploadFile = $uploadDir . $photoFile;
							
							if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
						 		# Se crea la relación
						 		$this->Estudy->Photo->create();
								if ($this->Estudy->Photo->save(array('file'=>$photoFile, 'name'=>$photoName))) {
									$this->Estudy->EstudiesPhoto->create();
									$this->Estudy->EstudiesPhoto->save(array('estudy_id' => $estudy_id
										, 'photo_id' => $this->Estudy->Photo->id
										, 'user_id' => AuthComponent::user('id')
										)
									);
								}
							}
							
						}
				 	}
				}

				# Videos
				if (isset($estudy['Video']) && sizeof($estudy['Video']) > 0) {
				 	foreach ($estudy['Video'] as $key => $video) {
				 		if(isset($video['file']) && isset($video['name'])) {
					 		# Se crea la relación
					 		$this->Estudy->Video->create();
					 		if ($this->Estudy->Video->save(array('file' => $video['file'], 'name' => $video['name']))) {
					 			$this->Estudy->EstudiesVideo->create();
					 			$this->Estudy->EstudiesVideo->save(array('estudy_id' => $estudy_id
									, 'video_id' => $this->Estudy->Video->id
									, 'user_id' => AuthComponent::user('id')
									)
								);
					 		}
				 		}
				 	}
				}

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
		$this->layout = 'mapadeladanza';
		
		$options = array('conditions' => array('Estudy.' . $this->Estudy->primaryKey => $id));
		$this->set('estudy', $this->Estudy->find('first', $options));
	}

}
