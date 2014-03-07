<?php
App::uses('CastingsDancestyle', 'Model');

/**
 * CastingsDancestyle Test Case
 *
 */
class CastingsDancestyleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.castings_dancestyle',
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
		$this->CastingsDancestyle = ClassRegistry::init('CastingsDancestyle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CastingsDancestyle);

		parent::tearDown();
	}

}
