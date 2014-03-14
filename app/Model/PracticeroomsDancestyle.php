<?php
App::uses('AppModel', 'Model');
/**
 * PracticeroomsDancestyle Model
 *
 * @property Practicerooms $Practicerooms
 * @property Dancestyle $Dancestyle
 * @property User $User
 */
class PracticeroomsDancestyle extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'practicerooms_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'dancestyle_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Practicerooms' => array(
			'className' => 'Practicerooms',
			'foreignKey' => 'practicerooms_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Dancestyle' => array(
			'className' => 'Dancestyle',
			'foreignKey' => 'dancestyle_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
