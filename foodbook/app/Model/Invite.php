<?php
App::uses('AppModel', 'Model');
/**
 * Invite Model
 *
 * @property IviterUser $IviterUser
 * @property InvitedUser $InvitedUser
 * @property Event $Event
 */
class Invite extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'IviterUser' => array(
			'className' => 'IviterUser',
			'foreignKey' => 'iviter_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'InvitedUser' => array(
			'className' => 'InvitedUser',
			'foreignKey' => 'invited_user_id',
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
