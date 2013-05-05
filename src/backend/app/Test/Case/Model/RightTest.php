<?php
App::uses('Right', 'Model');

/**
 * Right Test Case
 *
 */
class RightTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.right',
		'app.group',
		'app.user',
		'app.door',
		'app.log',
		'app.card'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Right = ClassRegistry::init('Right');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Right);

		parent::tearDown();
	}

}
