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
class AuditionsearchesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('index');
	}


	/**
	* Se desarrolla una lógica para independizarnos de los nombres de los Controllers
	*/
	public function index() {
		$elements = array();
		$todas = 1;
		
		if ($this->request->is('post')) {
			if(isset($this->request->data['Auditionsearches'])) {
				$data = $this->request->data['Auditionsearches'];
				$todas = sizeof($data) == 0;
				$this->set(compact('data'));
				// $this->request->data['auditions'] = 1;
			}
		}

		###
		# Elementos Buscados
		###

		if(isset($data['auditions']) || $todas)
			$elements = array_merge($elements, $this->requestAction(array('controller' => 'auditions', 'action' => 'getElements')));
		if(isset($data['calls']) || $todas)
			$elements = array_merge($elements, $this->requestAction(array('controller' => 'calls', 'action' => 'getElements')));
		if(isset($data['castings']) || $todas)
			$elements = array_merge($elements, $this->requestAction(array('controller' => 'castings', 'action' => 'getElements')));
		if(isset($data['jobs']) || $todas)
			$elements = array_merge($elements, $this->requestAction(array('controller' => 'jobs', 'action' => 'getElements')));
		

		# Se desarrolla una lógica para independizarnos de los nombres de los Controllers
		foreach($elements as $key => $element):
			$auxNames = array_keys($element);
			$auxValues = array_values($element);
			$name = strtolower($auxNames[0]);
			$namePlural = $name.'s';
			$id = $auxValues[0]['id'];
			$image = IMAGES_URL . ($auxValues[0]['image'] ? $namePlural . '/'.$auxValues[0]['image'] : 'layouts/sinfoto.jpg');
			$title = $auxValues[0]['title'] ? substr($auxValues[0]['title'], 0, 50) : __('No Title');
			$dateSort = $auxValues[0]['element-date'];
			
			$elements[$key] = array_merge($element
				, array('name' => $name
					, 'name-plural' => $namePlural
					, 'link' => Router::url(array('controller'=>$namePlural, 'action'=>'view', $id))
					, 'image' => $image
					, 'title' => $title
					, 'date-sort' => $dateSort
				)
			);
		endforeach;

		function sortElements($a, $b) {
			// return $a;
			// debug($b, $showHtml = null, $showFrom = true);
			if ($a['date-sort'] == $b['date-sort']) {
				return 0;
			}
			return ($a['date-sort'] > $b['date-sort']) ? -1 : 1;
		}

		usort($elements, 'sortElements');

		# /elementosBuscados

		###
		# Elementos Destacados
		###

		$salients = $this->requestAction(array('controller' => 'auditions', 'action' => 'getSalients'));
		$salients = array_merge($salients, $this->requestAction(array('controller' => 'calls', 'action' => 'getSalients')));
		$salients = array_merge($salients, $this->requestAction(array('controller' => 'castings', 'action' => 'getSalients')));
		$salients = array_merge($salients, $this->requestAction(array('controller' => 'jobs', 'action' => 'getSalients')));


		# Se desarrolla una lógica para independizarnos de los nombres de los Controllers
		foreach($salients as $key => $salient):
			$auxNames = array_keys($salient);
			$auxValues = array_values($salient);
			$name = strtolower($auxNames[0]);
			$namePlural = $name.'s';
			$id = $auxValues[0]['id'];
			$image = ($auxValues[0]['image'] ? $namePlural . '/'.$auxValues[0]['image'] : 'layouts/sinfoto.jpg');
			$title = $auxValues[0]['title'] ? substr($auxValues[0]['title'], 0, 50) : __('No Title');
			
			$salients[$key] = array_merge($salient
				, array('image' => $image
					, 'link' => Router::url(array('controller'=>$namePlural, 'action'=>'view', $id))
					, 'name-plural' => $namePlural
					, 'name' => $name
					, 'title' => $title
				)
			);
		endforeach;

		# /elementosDestacados

		$this->set(compact('data', 'elements', 'salients'));
		
	}

	// // Comparison function
	// function datesDesc($a, $b) {
	// 	if ($a == $b) {
	// 		return 0;
	// 	}
	// 	return ($a > $b) ? -1 : 1;
	// }

	// Comparison function
	// public function datesDesc($a, $b) {
	// 	return $a;
	// 	debug($b, $showHtml = null, $showFrom = true);
	// 	if ($a['date-sort'] == $b['date-sort']) {
	// 		return 0;
	// 	}
	// 	return ($a['date-sort'] > $b['date-sort']) ? -1 : 1;
	// }

}
