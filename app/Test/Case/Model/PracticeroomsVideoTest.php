<?php
App::uses('PracticeroomsVideo', 'Model');

/**
 * PracticeroomsVideo Test Case
 *
 */
class PracticeroomsVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.practicerooms_video',
		'app.practiceroom',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
		'app.tag',
		'app.tagged',
		'app.room',
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
		'app.practicerooms_timetable',
		'app.practicerooms_dancestyle',
		'app.video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PracticeroomsVideo = ClassRegistry::init('PracticeroomsVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PracticeroomsVideo);

		parent::tearDown();
	}

}
