<?php
App::uses('BannersBannercategory', 'Model');

/**
 * BannersBannercategory Test Case
 *
 */
class BannersBannercategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.banners_bannercategory',
		'app.banner',
		'app.user',
		'app.rol',
		'app.state',
		'app.country',
		'app.note',
		'app.bannercategory',
		'app.bannercategorie'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BannersBannercategory = ClassRegistry::init('BannersBannercategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BannersBannercategory);

		parent::tearDown();
	}

}
