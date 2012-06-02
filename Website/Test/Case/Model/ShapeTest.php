<?php
App::uses('Shape', 'Model');

/**
 * Shape Test Case
 *
 */
class ShapeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shape',
		'app.trip'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Shape = ClassRegistry::init('Shape');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Shape);

		parent::tearDown();
	}

}
