<?php
App::uses('JobsVideo', 'Model');

/**
 * JobsVideo Test Case
 *
 */
class JobsVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.jobs_video',
		'app.job',
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
		'app.jobs_dancestyle',
		'app.jobs_profession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->JobsVideo = ClassRegistry::init('JobsVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->JobsVideo);

		parent::tearDown();
	}

}
