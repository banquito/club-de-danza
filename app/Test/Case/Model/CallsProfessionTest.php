<?php
App::uses('CallsProfession', 'Model');

/**
 * CallsProfession Test Case
 *
 */
class CallsProfessionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calls_profession',
		'app.call',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
		'app.dancestyle',
		'app.audition',
		'app.auditions_dancestyle',
		'app.profession',
		'app.auditions_profession',
		'app.calls_dancestyle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CallsProfession = ClassRegistry::init('CallsProfession');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CallsProfession);

		parent::tearDown();
	}

}
