<?php
App::uses('AppModel', 'Model');
/**
 * Dancestyle Model
 *
 * @property User $User
 * @property Audition $Audition
 */
class Dancestyle extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
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

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Audition' => array(
			'className' => 'Audition',
			'joinTable' => 'auditions_dancestyles',
			'foreignKey' => 'dancestyle_id',
			'associationForeignKey' => 'audition_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Accesory' => array(
			'className' => 'Accesory',
			'joinTable' => 'accesories_dancestyles',
			'foreignKey' => 'dancestyle_id',
			'associationForeignKey' => 'accesory_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Estudy' => array(
			'className' => 'Estudy',
			'joinTable' => 'estudies_dancestyles',
			'foreignKey' => 'dancestyle_id',
			'associationForeignKey' => 'estudy_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Practiceroom' => array(
			'className' => 'Practiceroom',
			'joinTable' => 'practicerooms_dancestyles',
			'foreignKey' => 'dancestyle_id',
			'associationForeignKey' => 'practiceroom_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
	);

}
