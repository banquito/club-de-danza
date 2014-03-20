<?php
App::uses('CastingsVideo', 'Model');

/**
 * CastingsVideo Test Case
 *
 */
class CastingsVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.castings_video',
		'app.casting',
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
		'app.castings_dancestyle',
		'app.castings_profession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CastingsVideo = ClassRegistry::init('CastingsVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CastingsVideo);

		parent::tearDown();
	}

}
