<?php
App::uses('Slider', 'Model');

/**
 * Slider Test Case
 *
 */
class SliderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.slider',
		'app.user',
		'app.rol',
		'app.state',
		'app.country',
		'app.note'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Slider = ClassRegistry::init('Slider');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Slider);

		parent::tearDown();
	}

}
