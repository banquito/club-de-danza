<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 * @property Accessory $Accessory
 * @property Audition $Audition
 * @property Call $Call
 * @property Casting $Casting
 * @property Estudy $Estudy
 * @property Job $Job
 * @property Practiceroom $Practiceroom
 */
class Photo extends AppModel {

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
		'file' => array(
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
		'Accessory' => array(
			'className' => 'Accessory',
			'joinTable' => 'accessories_photos',
			'foreignKey' => 'photo_id',
			'associationForeignKey' => 'accessory_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Audition' => array(
			'className' => 'Audition',
			'joinTable' => 'auditions_photos',
			'foreignKey' => 'photo_id',
			'associationForeignKey' => 'audition_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Call' => array(
			'className' => 'Call',
			'joinTable' => 'calls_photos',
			'foreignKey' => 'photo_id',
			'associationForeignKey' => 'call_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Casting' => array(
			'className' => 'Casting',
			'joinTable' => 'castings_photos',
			'foreignKey' => 'photo_id',
			'associationForeignKey' => 'casting_id',
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
			'joinTable' => 'estudies_photos',
			'foreignKey' => 'photo_id',
			'associationForeignKey' => 'estudy_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Job' => array(
			'className' => 'Job',
			'joinTable' => 'jobs_photos',
			'foreignKey' => 'photo_id',
			'associationForeignKey' => 'job_id',
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
			'joinTable' => 'practicerooms_photos',
			'foreignKey' => 'photo_id',
			'associationForeignKey' => 'practiceroom_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
