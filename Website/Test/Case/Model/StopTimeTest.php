<?php
App::uses('StopTime', 'Model');

/**
 * StopTime Test Case
 *
 */
class StopTimeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stop_time',
		'app.trip',
		'app.stop'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StopTime = ClassRegistry::init('StopTime');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StopTime);

		parent::tearDown();
	}

}
