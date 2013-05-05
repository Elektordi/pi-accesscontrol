<?php
/**
 * LogFixture
 *
 */
class LogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'timestamp' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'action' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'card_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'door_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'result' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'timestamp' => '2013-05-04 00:13:29',
			'action' => 'Lorem ipsum dolor sit amet',
			'card_id' => 1,
			'door_id' => 1,
			'result' => 'Lorem ip'
		),
	);

}
