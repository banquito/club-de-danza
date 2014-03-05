<?php
App::uses('Profession', 'Model');

/**
 * Profession Test Case
 *
 */
class ProfessionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.profession',
		'app.user',
		'app.rol',
		'app.state',
		'app.country',
		'app.note',
		'app.audition',
		'app.dancestyle',
		'app.auditions_dancestyle',
		'app.auditions_profession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Profession = ClassRegistry::init('Profession');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Profession);

		parent::tearDown();
	}

}
