<?php
App::uses('Video', 'Model');

/**
 * Video Test Case
 *
 */
class VideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.video',
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
		'app.practicerooms_video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Video = ClassRegistry::init('Video');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Video);

		parent::tearDown();
	}

}
