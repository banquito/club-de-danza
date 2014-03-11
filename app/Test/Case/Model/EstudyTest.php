<?php
App::uses('Estudy', 'Model');

/**
 * Estudy Test Case
 *
 */
class EstudyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estudy',
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
		'app.estudies_dancestyle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Estudy = ClassRegistry::init('Estudy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estudy);

		parent::tearDown();
	}

}
