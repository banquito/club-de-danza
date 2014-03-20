<?php
App::uses('AppModel', 'Model');
/**
 * Attachment Model
 *
 * @property Audition $Audition
 * @property Call $Call
 * @property Casting $Casting
 * @property Job $Job
 */
class Attachment extends AppModel {

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
		'Audition' => array(
			'className' => 'Audition',
			'joinTable' => 'attachments_auditions',
			'foreignKey' => 'attachment_id',
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
			'joinTable' => 'attachments_calls',
			'foreignKey' => 'attachment_id',
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
			'joinTable' => 'attachments_castings',
			'foreignKey' => 'attachment_id',
			'associationForeignKey' => 'casting_id',
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
			'joinTable' => 'attachments_jobs',
			'foreignKey' => 'attachment_id',
			'associationForeignKey' => 'job_id',
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
