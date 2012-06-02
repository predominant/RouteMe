<?php
/**
 * TripFixture
 *
 */
class TripFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'route_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'service_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'trip_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'trip_headsign' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'direction_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'block_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'shape_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'route_id' => 'Lorem ipsum dolor sit amet',
			'service_id' => 'Lorem ipsum dolor sit amet',
			'trip_id' => 'Lorem ipsum dolor sit amet',
			'trip_headsign' => 'Lorem ipsum dolor sit amet',
			'direction_id' => 1,
			'block_id' => 1,
			'shape_id' => 'Lorem ipsum dolor sit amet'
		),
	);

}
