<?php
App::uses('Practiceroom', 'Model');

/**
 * Practiceroom Test Case
 *
 */
class PracticeroomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.practiceroom',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
		'app.room',
		'app.dancestyle',
		'app.audition',
		'app.auditions_dancestyle',
		'app.profession',
		'app.auditions_profession',
		'app.practicerooms_dancestyle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Practiceroom = ClassRegistry::init('Practiceroom');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Practiceroom);

		parent::tearDown();
	}

}
