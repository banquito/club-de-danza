<?php
App::uses('PracticeroomsTimetable', 'Model');

/**
 * PracticeroomsTimetable Test Case
 *
 */
class PracticeroomsTimetableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.practicerooms_timetable',
		'app.practiceroom',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
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
		'app.practicerooms_dancestyle',
		'app.timetable'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PracticeroomsTimetable = ClassRegistry::init('PracticeroomsTimetable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PracticeroomsTimetable);

		parent::tearDown();
	}

}
