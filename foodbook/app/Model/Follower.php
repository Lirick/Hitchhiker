<?php
App::uses('AppModel', 'Model');
/**
 * Follower Model
 *
 */
class Follower extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';
	
	
	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'uid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FFollower' => array(
			'className' => 'User',
			'foreignKey' => 'follower_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
