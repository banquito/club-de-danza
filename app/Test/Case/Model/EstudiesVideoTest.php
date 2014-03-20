<?php
App::uses('EstudiesVideo', 'Model');

/**
 * EstudiesVideo Test Case
 *
 */
class EstudiesVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estudies_video',
		'app.estudy',
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
		'app.estudies_dancestyle',
		'app.practiceroom',
		'app.room',
		'app.practicerooms_dancestyle',
		'app.timetable',
		'app.estudies_timetable',
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
		$this->EstudiesVideo = ClassRegistry::init('EstudiesVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EstudiesVideo);

		parent::tearDown();
	}

}
