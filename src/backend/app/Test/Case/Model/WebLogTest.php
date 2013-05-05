<?php
App::uses('WebLog', 'Model');

/**
 * WebLog Test Case
 *
 */
class WebLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.web_log',
		'app.user',
		'app.group',
		'app.right',
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
		$this->WebLog = ClassRegistry::init('WebLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WebLog);

		parent::tearDown();
	}

}
