<?php
App::uses('Call', 'Model');

/**
 * Call Test Case
 *
 */
class CallTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.calls_dancestyle',
		'app.calls_profession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Call = ClassRegistry::init('Call');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Call);

		parent::tearDown();
	}

}
