<?php
App::uses('AppModel', 'Model');
/**
 * Video Model
 *
 * @property Practiceroom $Practiceroom
 */
class Video extends AppModel {

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
		'Practiceroom' => array(
			'className' => 'Practiceroom',
			'joinTable' => 'practicerooms_videos',
			'foreignKey' => 'video_id',
			'associationForeignKey' => 'practiceroom_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Accessory' => array(
			'className' => 'Accessory',
			'joinTable' => 'accessories_videos',
			'foreignKey' => 'video_id',
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
			'joinTable' => 'auditions_videos',
			'foreignKey' => 'video_id',
			'associationForeignKey' => 'audition_id',
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
