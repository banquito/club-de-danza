<?php
App::uses('AccessoriesDancestyle', 'Model');

/**
 * AccessoriesDancestyle Test Case
 *
 */
class AccessoriesDancestyleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.accessories_dancestyle',
		'app.accessories',
		'app.dancestyle',
		'app.user',
		'app.rol',
		'app.state',
		'app.country',
		'app.note',
		'app.audition',
		'app.auditions_dancestyle',
		'app.profession',
		'app.auditions_profession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AccessoriesDancestyle = ClassRegistry::init('AccessoriesDancestyle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AccessoriesDancestyle);

		parent::tearDown();
	}

}
