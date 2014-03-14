<?php
App::uses('AppModel', 'Model');
/**
 * EstudiesTimetable Model
 *
 * @property Estudy $Estudy
 * @property Timetable $Timetable
 */
class EstudiesTimetable extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'estudy_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'timetable_id' => array(
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
		'Estudy' => array(
			'className' => 'Estudy',
			'foreignKey' => 'estudy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Timetable' => array(
			'className' => 'Timetable',
			'foreignKey' => 'timetable_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
