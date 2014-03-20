<?php
App::uses('AttachmentsAudition', 'Model');

/**
 * AttachmentsAudition Test Case
 *
 */
class AttachmentsAuditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attachments_audition',
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
		'app.accessory',
		'app.accessories_dancestyle',
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
		'app.accessories_video',
		'app.auditions_video',
		'app.profession',
		'app.auditions_profession',
		'app.attachment',
		'app.call',
		'app.calls_dancestyle',
		'app.calls_profession',
		'app.calls_video',
		'app.attachments_call',
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
		$this->AttachmentsAudition = ClassRegistry::init('AttachmentsAudition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttachmentsAudition);

		parent::tearDown();
	}

}
