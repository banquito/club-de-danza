<?php
/**
 * AuditionFixture
 *
 */
class AuditionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'image' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'company' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'gender' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'age-start' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'age-end' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'audition-date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'street' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'floor' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'department' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'inscription-star' => array('type' => 'integer', 'null' => false, 'default' => null),
		'inscription-end' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'inscription-place' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'website' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'phone' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '531665e4-2ba0-40d3-9bef-134b997c5dae',
			'title' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'image' => 'Lorem ipsum dolor sit amet',
			'company' => 'Lorem ipsum dolor sit amet',
			'gender' => 1,
			'age-start' => 'Lorem ipsum dolor sit amet',
			'age-end' => 'Lorem ipsum dolor sit amet',
			'audition-date' => '2014-03-04 20:46:44',
			'street' => 'Lorem ipsum dolor sit amet',
			'floor' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'inscription-star' => 1,
			'inscription-end' => '2014-03-04 20:46:44',
			'inscription-place' => '2014-03-04 20:46:44',
			'website' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-03-04 20:46:44',
			'modified' => '2014-03-04 20:46:44',
			'state_id' => 1,
			'user_id' => 'Lorem ipsum dolor sit amet'
		),
	);

}
