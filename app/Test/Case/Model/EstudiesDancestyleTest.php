<?php
App::uses('EstudiesDancestyle', 'Model');

/**
 * EstudiesDancestyle Test Case
 *
 */
class EstudiesDancestyleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estudies_dancestyle',
		'app.estudies',
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
		$this->EstudiesDancestyle = ClassRegistry::init('EstudiesDancestyle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EstudiesDancestyle);

		parent::tearDown();
	}

}
