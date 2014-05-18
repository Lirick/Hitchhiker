<?php
App::uses('AppModel', 'Model');
/**
 * Invitedto Model
 *
 * @property User $User
 * @property Event $Event
 */
class Invitedto extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'invitedto';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
