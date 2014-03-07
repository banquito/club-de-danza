<?php
App::uses('JobsDancestyle', 'Model');

/**
 * JobsDancestyle Test Case
 *
 */
class JobsDancestyleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.jobs_dancestyle',
		'app.job',
		'app.state',
		'app.country',
		'app.user',
		'app.rol',
		'app.note',
		'app.dancestyle',
		'app.audition',
		'app.auditions_dancestyle',
		'app.profession',
		'app.auditions_profession',
		'app.jobs_profession'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->JobsDancestyle = ClassRegistry::init('JobsDancestyle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->JobsDancestyle);

		parent::tearDown();
	}

}
