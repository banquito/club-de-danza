<?php
App::uses('Audition', 'Model');

/**
 * Audition Test Case
 *
 */
class AuditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.audition',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
		'app.dancestyle',
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
		$this->Audition = ClassRegistry::init('Audition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Audition);

		parent::tearDown();
	}

}
