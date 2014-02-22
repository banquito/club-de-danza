<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 * @property User $User
 */
class Slider extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'image' => array(
			'vacio' => array(
				'rule'		=> 'archivoVacio',
				'on'		=>  'create',
				'message'	=> 'Debe ingresar una imagen.',
			),
			'tipoDeArchivo' => array(
				'rule'		=>  array('extension', array('gif', 'jpeg', 'png', 'jpg')),
				'on'		=>  'create',
				'message'	=>  'Ingrese una extensión válida.',
			),
			'tipoDeArchivoUpdate'	=> array(
				 'rule'		=>  array('extension', array('gif', 'jpeg', 'png', 'jpg')),
				 'on'		=> 'update',
				 'message'	=>  'Verifique la extensión del archivo o el tamaño.',
			),
		),
		'link' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/***********************************************************************************************************
	* Funciones
	********************************************************************************************************** */


	public function archivoVacio($field = array()) {
		$keya = key($field);
		$valuea = array_values($field);
		$valueb = $valuea[0];
		
		if (!empty($valueb['name'])){
			return true;
		} else {
			return false;
		}
	}
	
	public $findMethods = array('published' =>  true);

	// TODO: ver cómo filtrar las categorías
	protected function _findPublished($state, $query, $results = array()) {
		if ($state === 'before') {
			$query['fields'] = array('Slider.title', 'Slider.image', 'Slider.link');
			$query['recursive'] = -1;
			$query['conditions']['Slider.published'] = true;
			return $query;
		}
		return $results;
	}

}
