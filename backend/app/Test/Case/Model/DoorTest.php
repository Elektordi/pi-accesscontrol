<?php
App::uses('Door', 'Model');

/**
 * Door Test Case
 *
 */
class DoorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.door',
		'app.log',
		'app.right'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Door = ClassRegistry::init('Door');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Door);

		parent::tearDown();
	}

}
