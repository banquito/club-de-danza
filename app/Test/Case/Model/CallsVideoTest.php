<?php
App::uses('CallsVideo', 'Model');

/**
 * CallsVideo Test Case
 *
 */
class CallsVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calls_video',
		'app.call',
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
		'app.practicerooms_video',
		'app.calls_dancestyle',
		'app.calls_profession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CallsVideo = ClassRegistry::init('CallsVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CallsVideo);

		parent::tearDown();
	}

}
