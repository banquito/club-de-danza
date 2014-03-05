<?php
App::uses('AuditionsProfession', 'Model');

/**
 * AuditionsProfession Test Case
 *
 */
class AuditionsProfessionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.auditions_profession',
		'app.audition',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
		'app.dancestyle',
		'app.auditions_dancestyle',
		'app.profession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AuditionsProfession = ClassRegistry::init('AuditionsProfession');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AuditionsProfession);

		parent::tearDown();
	}

}
