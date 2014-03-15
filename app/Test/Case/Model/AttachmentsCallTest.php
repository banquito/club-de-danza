<?php
App::uses('AttachmentsCall', 'Model');

/**
 * AttachmentsCall Test Case
 *
 */
class AttachmentsCallTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attachments_call',
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
		'app.video',
		'app.practiceroom',
		'app.room',
		'app.practicerooms_dancestyle',
		'app.timetable',
		'app.estudy',
		'app.estudies_dancestyle',
		'app.estudies_timetable',
		'app.estudies_video',
		'app.practicerooms_timetable',
		'app.practicerooms_video',
		'app.accessory',
		'app.accessories_dancestyle',
		'app.accessories_video',
		'app.auditions_video',
		'app.calls_dancestyle',
		'app.calls_profession',
		'app.calls_video',
		'app.attachment',
		'app.attachments_audition',
		'app.casting',
		'app.castings_dancestyle',
		'app.castings_profession',
		'app.castings_video',
		'app.attachments_casting',
		'app.job',
		'app.jobs_dancestyle',
		'app.jobs_profession',
		'app.jobs_video',
		'app.attachments_job'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AttachmentsCall = ClassRegistry::init('AttachmentsCall');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttachmentsCall);

		parent::tearDown();
	}

}
