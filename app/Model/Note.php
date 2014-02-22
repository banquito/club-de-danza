<?php
App::uses('AppModel', 'Model');
/**
 * Note Model
 *
 * @property User $User
 */
class Note extends AppModel {

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
		'image'=> array(
			'vacio'     => array(
				'rule'      => 'archivoVacio',
				'on'        =>  'create',
				'message'   => 'Debe ingresar una imagen.',
			),
			'tipoDeArchivo' => array(
				'rule'      =>  array('extension', array('gif', 'jpeg', 'png', 'jpg')),
				'on'        =>  'create',
				'message'   =>  'Ingrese una extensión válida.',
			),
			'error'         => array(
				'rule'      => 'errorEnArchivo',
				'on'        =>  'create',
				'message'   => 'El tamaño del archivo es damasiado grande.',
			),
			'tipoDeArchivoUpdate'   => array(
				 'rule'      =>  'editar',
				 'on'    => 'update',
				 'message'   =>  'Verifique la extensión del archivo o el tamaño.',
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
	
	/*
	 * Verifica que el archivo no genere un error por el tamaño del mismo.
	 */
	public function editar($field = array()){
		$keya = key($field);
		$valueA = array_values($field);
		$valueB = $valueA[0];
		 
		 if (empty($valueB['name'])){
			return true;
		} elseif (($valueB['type']=='image/jpeg') || ($valueB['type'] == 'image/png')) {
			if(($valueB['error'])=='0') {
				return true;
			}
		}
		return false;
	}
	
	/*
	 * Verifica que el archivo no genere un error por el tamaño del mismo.
	 */
	public function errorEnArchivo($field = array()) {
		$keya = key($field);
		$valueA = array_values($field);
		$valueB = $valueA[0];
		
		if (($valueB['error']) == '0') {
			return true;
		} else {
			return false;
		}
	}

}
	