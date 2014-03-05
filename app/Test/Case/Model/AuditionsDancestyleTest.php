<?php
App::uses('AuditionsDancestyle', 'Model');

/**
 * AuditionsDancestyle Test Case
 *
 */
class AuditionsDancestyleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.auditions_dancestyle',
		'app.audition',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
		'app.dancestyle',
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
		$this->AuditionsDancestyle = ClassRegistry::init('AuditionsDancestyle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AuditionsDancestyle);

		parent::tearDown();
	}

}
