<?php
App::uses('Dancestyle', 'Model');

/**
 * Dancestyle Test Case
 *
 */
class DancestyleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Dancestyle = ClassRegistry::init('Dancestyle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dancestyle);

		parent::tearDown();
	}

}
