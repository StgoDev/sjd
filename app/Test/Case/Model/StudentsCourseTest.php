<?php
App::uses('StudentsCourse', 'Model');

/**
 * StudentsCourse Test Case
 */
class StudentsCourseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.students_course',
		'app.student',
		'app.room',
		'app.course',
		'app.subject',
		'app.students_subject'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StudentsCourse = ClassRegistry::init('StudentsCourse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StudentsCourse);

		parent::tearDown();
	}

}
