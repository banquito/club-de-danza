<?php
App::uses('AuditionsVideo', 'Model');

/**
 * AuditionsVideo Test Case
 *
 */
class AuditionsVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.auditions_video',
		'app.audition',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
		'app.tag',
		'app.tagged',
		'app.dancestyle',
		'app.auditions_dancestyle',
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
		'app.practicerooms_video',
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
		$this->AuditionsVideo = ClassRegistry::init('AuditionsVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AuditionsVideo);

		parent::tearDown();
	}

}
