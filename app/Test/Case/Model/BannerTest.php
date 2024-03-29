<?php
App::uses('Banner', 'Model');

/**
 * Banner Test Case
 *
 */
class BannerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.banner',
		'app.user',
		'app.rol',
		'app.state',
		'app.country',
		'app.note',
		'app.bannercategorie'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Banner = ClassRegistry::init('Banner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Banner);

		parent::tearDown();
	}

}
