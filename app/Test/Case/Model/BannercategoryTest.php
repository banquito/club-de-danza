<?php
App::uses('Bannercategory', 'Model');

/**
 * Bannercategory Test Case
 *
 */
class BannercategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bannercategory',
		'app.user',
		'app.rol',
		'app.state',
		'app.country',
		'app.note'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bannercategory = ClassRegistry::init('Bannercategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bannercategory);

		parent::tearDown();
	}

}
