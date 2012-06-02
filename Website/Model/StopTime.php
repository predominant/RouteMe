<?php
App::uses('AppModel', 'Model');
/**
 * StopTime Model
 *
 * @property Trip $Trip
 * @property Stop $Stop
 */
class StopTime extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Trip' => array(
			'className' => 'Trip',
			'foreignKey' => 'trip_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Stop' => array(
			'className' => 'Stop',
			'foreignKey' => 'stop_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
