<?php
App::uses('AttachmentsCasting', 'Model');

/**
 * AttachmentsCasting Test Case
 *
 */
class AttachmentsCastingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attachments_casting',
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
		'app.castings_dancestyle',
		'app.castings_profession',
		'app.castings_video',
		'app.attachment',
		'app.attachments_audition',
		'app.call',
		'app.calls_dancestyle',
		'app.calls_profession',
		'app.calls_video',
		'app.attachments_call',
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
		$this->AttachmentsCasting = ClassRegistry::init('AttachmentsCasting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AttachmentsCasting);

		parent::tearDown();
	}

}
