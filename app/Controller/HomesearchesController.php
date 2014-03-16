<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomesearchesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	// public $uses = array();

	/*************************************************************************************************************************
	* Autentication
	**************************************************************************************************************************/

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function isAuthorized($user) {
		$artist = array();
		$owner = array();
		$admin = array_merge($artist, $owner, array('admin'));

		// All artist users can index posts
		if (in_array($this->action, $artist)) {
			return true;
		}

		// // The owner of an element can edit and delete it
		// if (in_array($this->action, $owner)) {
		// 	$elementId = $this->request->params['pass'][0];
		// 	if ($this->Audition->isOwnedBy($elementId, $user['id'])) {
		// 		return true;
		// 	}
		// }

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



	public function admin() {
		if ($this->request->is(array('post', 'put'))) {
			$homesearch = $this->request->input('json_decode');

			$caja = $this->Homesearch->find('first', array('conditions'=>array('Homesearch.box'=>$homesearch->homesearch->caja)));

			debug($homesearch->homesearch->caja, $showHtml = null, $showFrom = true);
			debug($caja, $showHtml = null, $showFrom = true);

			$this->Homesearch->id = $caja['Homesearch']['id'];
			$this->Homesearch->saveField('title', $homesearch->homesearch->title);
			$this->Homesearch->saveField('image', $homesearch->homesearch->image);
			$this->Homesearch->saveField('url', $homesearch->homesearch->url);
			$this->Homesearch->saveField('user_id', AuthComponent::user('id'));

		}


	}

	public function getElements() {
		$query = $this->params->query;
		$section = json_decode($query['section']);
		$subsection = '';
		$elements = array();

		if(isset($section->subsection)) {
			$subsection = $section->subsection->name;
		}

		switch ($section->name) {
			case 'auditions_calls':
				switch ($subsection) {
					case 'auditions':
						$elements = $this->requestAction(array('controller'=>'auditions', 'action'=>'getElements'));
						break;
					case 'calls':
						$elements = $this->requestAction(array('controller'=>'calls', 'action'=>'getElements'));
						break;
					case 'castings':
						$elements = $this->requestAction(array('controller'=>'castings', 'action'=>'getElements'));
						break;
					
					default:
						break;
				}
				break;
			case 'mapadeladanza':
				switch ($subsection) {
					case 'accessories':
						$elements = $this->requestAction(array('controller'=>'accessories', 'action'=>'getElements'));
						break;
					case 'estudies':
						$elements = $this->requestAction(array('controller'=>'estudies', 'action'=>'getElements'));
						break;
					case 'practicerooms':
						$elements = $this->requestAction(array('controller'=>'practicerooms', 'action'=>'getElements'));
						break;
					
					default:
						break;
				}
				break;
			case 'notes':
				$elements = $this->requestAction(array('controller'=>'notes', 'action'=>'getElements'));
				break;
			
			default:
				break;
		}

		// debug($subsection, $showHtml = null, $showFrom = true);


		$this->layout = 'ajax';
		$this->autoRender = false;
		return json_encode($elements);
	}

	public function index() {
		$options['recursive'] = -1;
		$options['order'] = 'box ASC';
		$homesearches = $this->Homesearch->find('all', $options);
		$items = $this->requestAction(array('controller' => 'sliders', 'action' => 'getItems')
			, array('named' => array('category' => 1))
		);

		$this->set(compact('homesearches', 'items'));
	}

}
