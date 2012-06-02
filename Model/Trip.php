<?php
App::uses('AppModel', 'Model');
/**
 * Trip Model
 *
 * @property Route $Route
 * @property Service $Service
 * @property Trip $Trip
 * @property Direction $Direction
 * @property Block $Block
 * @property Shape $Shape
 * @property StopTime $StopTime
 * @property Trip $Trip
 */
class Trip extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Route' => array(
			'className' => 'Route',
			'foreignKey' => 'route_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		// 'Service' => array(
		// 	'className' => 'Service',
		// 	'foreignKey' => 'service_id',
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => ''
		// ),
		// 'Trip' => array(
		// 	'className' => 'Trip',
		// 	'foreignKey' => 'trip_id',
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => ''
		// ),
		// 'Direction' => array(
		// 	'className' => 'Direction',
		// 	'foreignKey' => 'direction_id',
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => ''
		// ),
		// 'Block' => array(
		// 	'className' => 'Block',
		// 	'foreignKey' => 'block_id',
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => ''
		// ),
		'Shape' => array(
			'className' => 'Shape',
			'foreignKey' => 'shape_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'StopTime' => array(
			'className' => 'StopTime',
			'foreignKey' => 'trip_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		// 'Trip' => array(
		// 	'className' => 'Trip',
		// 	'foreignKey' => 'trip_id',
		// 	'dependent' => false,
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => '',
		// 	'limit' => '',
		// 	'offset' => '',
		// 	'exclusive' => '',
		// 	'finderQuery' => '',
		// 	'counterQuery' => ''
		// )
	);

}
