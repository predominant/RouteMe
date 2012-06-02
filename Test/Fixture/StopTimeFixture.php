<?php
/**
 * StopTimeFixture
 *
 */
class StopTimeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'trip_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'arrival_time' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'departure_time' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'stop_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'stop_sequence' => array('type' => 'integer', 'null' => true, 'default' => null),
		'pickup_type' => array('type' => 'integer', 'null' => true, 'default' => null),
		'drop_off_type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'trip_id' => 'Lorem ipsum dolor sit amet',
			'arrival_time' => 'Lorem ipsum dolor sit amet',
			'departure_time' => 'Lorem ipsum dolor sit amet',
			'stop_id' => 1,
			'stop_sequence' => 1,
			'pickup_type' => 1,
			'drop_off_type' => 'Lorem ipsum dolor sit amet'
		),
	);

}
