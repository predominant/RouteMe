<?php
App::uses('AppModel', 'Model');
/**
 * Stop Model
 *
 * @property Zone $Zone
 * @property StopTime $StopTime
 */
class Stop extends AppModel {

	public $order = 'name';

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		// 'Zone' => array(
		// 	'className' => 'Zone',
		// 	'foreignKey' => 'zone_id',
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => ''
		// )
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'StopTime' => array(
			'className' => 'StopTime',
			'foreignKey' => 'stop_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
