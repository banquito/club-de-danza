<?php
App::uses('AppModel', 'Model');
/**
 * Timetable Model
 *
 * @property Practiceroom $Practiceroom
 */
class Timetable extends AppModel {

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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Estudy' => array(
			'className' => 'Estudy',
			'joinTable' => 'estudies_timetables',
			'foreignKey' => 'timetable_id',
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
			'joinTable' => 'practicerooms_timetables',
			'foreignKey' => 'timetable_id',
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
