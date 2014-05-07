<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property inviter_user_id $Invite
 * @property Event $Event
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'InviteFrom' => array(
			'className' => 'Invite',
			'foreignkey' => 'user_from'
		),
		'InviteTo' => array(
			'className' => 'Invite',
			'foreignkey' => 'user_to'
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Event' => array(
			'className' => 'Event',
			'joinTable' => 'users_events',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'event_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'UserInvite' => array(
          'className' => 'User',
          'joinTable' => 'invites',
          'foreignKey' => 'user_from',
          'associationForeignKey' => 'user_to'
          )
	);

}
