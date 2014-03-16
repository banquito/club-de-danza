<?php
App::uses('Homesearch', 'Model');

/**
 * Homesearch Test Case
 *
 */
class HomesearchTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.homesearch',
		'app.user',
		'app.rol',
		'app.state',
		'app.country',
		'app.note',
		'app.tag',
		'app.tagged'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Homesearch = ClassRegistry::init('Homesearch');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Homesearch);

		parent::tearDown();
	}

}
