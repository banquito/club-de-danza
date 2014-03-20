<?php
App::uses('AppController', 'Controller');
/**
 * AttachmentsJobs Controller
 *
 * @property AttachmentsJob $AttachmentsJob
 * @property PaginatorComponent $Paginator
 */
class AttachmentsJobsController extends AppController {

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
		$this->Auth->allow();
	}

	public function isAuthorized($user) {
		$artist = array();
		$owner = array('remove');
		$admin = array_merge($artist, $owner, array());

		// All artist users can index posts
		if (in_array($this->action, $artist)) {
			return true;
		}

		// The owner of an element can edit and delete it
		if (in_array($this->action, $owner)) {
			$elementId = $this->request->params['pass'][0];
			if ($this->AttachmentsJob->isOwnedBy($elementId, $user['id'])) {
				return true;
			}
		}

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
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AttachmentsJob->recursive = 0;
		$this->set('attachmentsJobs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AttachmentsJob->exists($id)) {
			throw new NotFoundException(__('Invalid attachments job'));
		}
		$options = array('conditions' => array('AttachmentsJob.' . $this->AttachmentsJob->primaryKey => $id));
		$this->set('attachmentsJob', $this->AttachmentsJob->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AttachmentsJob->create();
			if ($this->AttachmentsJob->save($this->request->data)) {
				$this->Session->setFlash(__('The attachments job has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachments job could not be saved. Please, try again.'));
			}
		}
		$jobs = $this->AttachmentsJob->Job->find('list');
		$attachments = $this->AttachmentsJob->Attachment->find('list');
		$users = $this->AttachmentsJob->User->find('list');
		$this->set(compact('jobs', 'attachments', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AttachmentsJob->exists($id)) {
			throw new NotFoundException(__('Invalid attachments job'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AttachmentsJob->save($this->request->data)) {
				$this->Session->setFlash(__('The attachments job has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachments job could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AttachmentsJob.' . $this->AttachmentsJob->primaryKey => $id));
			$this->request->data = $this->AttachmentsJob->find('first', $options);
		}
		$jobs = $this->AttachmentsJob->Job->find('list');
		$attachments = $this->AttachmentsJob->Attachment->find('list');
		$users = $this->AttachmentsJob->User->find('list');
		$this->set(compact('jobs', 'attachments', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AttachmentsJob->id = $id;
		if (!$this->AttachmentsJob->exists()) {
			throw new NotFoundException(__('Invalid attachments job'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AttachmentsJob->delete()) {
			$this->Session->setFlash(__('The attachments job has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attachments job could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * remove method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function remove($id = null) {
		$this->AttachmentsJob->id = $id;
		if (!$this->AttachmentsJob->exists()) {
			throw new NotFoundException(__('Invalid practicerooms timetable'));
		}
		$this->request->onlyAllow('get', 'delete');
		if ($this->AttachmentsJob->delete()) {
			$this->Session->setFlash(__('The practicerooms timetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The practicerooms timetable could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());
	}


}
