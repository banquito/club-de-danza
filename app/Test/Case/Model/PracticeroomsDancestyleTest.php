<?php
App::uses('PracticeroomsDancestyle', 'Model');

/**
 * PracticeroomsDancestyle Test Case
 *
 */
class PracticeroomsDancestyleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.practicerooms_dancestyle',
		'app.practicerooms',
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
		$this->PracticeroomsDancestyle = ClassRegistry::init('PracticeroomsDancestyle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PracticeroomsDancestyle);

		parent::tearDown();
	}

}
