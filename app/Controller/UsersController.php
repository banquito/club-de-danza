<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'confirm', 'logout');
		// $this->Auth->allow('*');
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			debug($this->request->data);
			
			# Se carga la librería del catpcha
			// require_once('recaptchalib.php');
			App::import('Vendor', 'extras', array('file' => 'extras.php'));
			App::import('Vendor', 'recaptchalib', array('file' => 'recaptchalib.php'));

			$privatekey = PRIVATE_KEY;
			$recaptcha_challenge_field = $this->request->data['recaptcha_challenge_field'];
			$recaptcha_response_field = $this->request->data['recaptcha_response_field'];
			
			$resp = recaptcha_check_answer($privatekey
				, $_SERVER["REMOTE_ADDR"]
				, $recaptcha_challenge_field
				, $recaptcha_response_field
			);

			if (!$resp->is_valid) {
				// What happens when the CAPTCHA was entered incorrectly
				// die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
				// 	 "(reCAPTCHA said: " . $resp->error . ")");
				$this->Session->setFlash(__('The reCAPTCHA wasn\'t entered correctly. Go back and try it again.'));
				$this->redirect('/');
			}

			$user = $this->request->data;
			$rolId = $this->User->Rol->field('id', array('weight' => User::ARTISTA));
			$user['User']['rol_id'] = $rolId;
			
			if(isset($user['User']['birthday']) && !empty($user['User']['birthday'])):
				// $birthday = DateTime::createFromFormat('d/m/Y', $user['User']['birthday']); # PHP >= 5.3
				# PHP 5.2
				$birthday = strptime($user['User']['birthday'], '%d/%m/%Y');
				$birthday = sprintf('%04d-%02d-%02d', $birthday['tm_year'] + 1900, $birthday['tm_mon'] + 1, $birthday['tm_mday']);
				$birthday = new DateTime($birthday);
				$user['User']['birthday'] = $birthday->format('Y-m-d H:i:s');
			endif;

			# Se crea el usuario y se lo autorregistra
			$this->User->create();
			if ($this->User->save($user)) {
				$to = $user['User']['email'];
				$subject = 'Club de Danza :: Confirma tu correo';
				$message = 'Confirma tu correo haciendo clic en el siguiente enlace: ' . Router::fullBaseUrl() . '/confirmacion/' . $this->User->id;
				$additional_headers = '';
				$additional_parameters = '';

				# Se envía el correo de confirmación
				mail($to, $subject, $message, $additional_headers, $additional_parameters);

				# Se envía al usuario a un mensaje de confirmación
				return $this->redirect('/confirmatucorreo');
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}

		$states = $this->User->State->find('list');
		$this->set(compact('states'));
	}


/**
 * confirm method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function confirm($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->User->read(null, $id);

		# Se verifica que el usuario no haya sido confirmado previamente,
		# es una especie de medida de seguridad para que no se loguee cualquiera
		# con cualquier ID
		if(!$user['User']['confirmed']) {
			$this->User->id = $id;
			$this->User->saveField('confirmed', TRUE);
			
			$this->Auth->login($user['User']);
			return $this->redirect('/');
		}
		$this->redirect('/logout');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
			$this->Paginator->settings = array(
				'conditions' => array('Rol.weight <' => User::ADMIN),
		);
		$this->set('users', $this->Paginator->paginate());
	}


public function login() {
		// $this -> layout = 'login';

		if ($this->request->is('post')) {
			if (isset($this->request->data['User'])) {
				$user = $this->request->data['User'];
				$confirmed = $this->User->field('confirmed', array('username' => $user['username']));

				if($confirmed) {
					if ($this->Auth->login()) {
						$this->redirect($this->Auth->redirect());
					}
				}
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
			$this->redirect('/');
			// if ($this->Auth->login()) {
			// 	$this->redirect($this->Auth->redirect());
			// } else {
			// 	$this->Session->setFlash(__('Invalid username or password, try again'));
			// }
		}
	}

	public function logout() {
		$this -> redirect($this -> Auth -> logout());
	}

	public function isAuthorized($user = null) {
		// All registered users can add posts
		// if ($this -> action === 'add') {
		// return true;
		// }

		// Todos los usuarios registrados podrán cambiar su location
		// if ($this->action === 'setLocation') {
		// 	return true;
		// }

		// The owner of a post can edit and delete it
		// if (in_array($this -> action, array(
		// 'edit',
		// 'delete'
		// ))) {
		// $postId = $this -> request -> params['pass'][0];
		// if ($this -> Post -> isOwnedBy($postId, $user['id'])) {
		// return true;
		// }
		// }

		return parent::isAuthorized($user);
	}




/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$rols = $this->User->Rol->find('list');
		$states = $this->User->State->find('list');
		$this->set(compact('rols', 'states'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
