<?php
App::uses('EstudiesTimetable', 'Model');

/**
 * EstudiesTimetable Test Case
 *
 */
class EstudiesTimetableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estudies_timetable',
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
		'app.practicerooms_timetable'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EstudiesTimetable = ClassRegistry::init('EstudiesTimetable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EstudiesTimetable);

		parent::tearDown();
	}

}
