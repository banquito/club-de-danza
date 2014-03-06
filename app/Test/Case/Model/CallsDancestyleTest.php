<?php
App::uses('CallsDancestyle', 'Model');

/**
 * CallsDancestyle Test Case
 *
 */
class CallsDancestyleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calls_dancestyle',
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
		'app.calls_profession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CallsDancestyle = ClassRegistry::init('CallsDancestyle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CallsDancestyle);

		parent::tearDown();
	}

}
