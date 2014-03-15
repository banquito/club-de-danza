<?php
App::uses('AccessoriesVideo', 'Model');

/**
 * AccessoriesVideo Test Case
 *
 */
class AccessoriesVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.accessories_video',
		'app.accessory',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
		'app.tag',
		'app.tagged',
		'app.dancestyle',
		'app.audition',
		'app.auditions_dancestyle',
		'app.profession',
		'app.auditions_profession',
		'app.accesory',
		'app.accessories_dancestyle',
		'app.estudy',
		'app.estudies_dancestyle',
		'app.timetable',
		'app.estudies_timetable',
		'app.practiceroom',
		'app.room',
		'app.practicerooms_dancestyle',
		'app.practicerooms_timetable',
		'app.video',
		'app.practicerooms_video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AccessoriesVideo = ClassRegistry::init('AccessoriesVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AccessoriesVideo);

		parent::tearDown();
	}

}
