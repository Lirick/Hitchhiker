<?php
App::uses('AppModel', 'Model');

/**
 * Event Model
 *
 * @property Invite $Invite
 * @property User $User
 */
class Event extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'ename';

	
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'ename' => array(
					'notEmpty' => array(
							'rule' => array('notEmpty'),
							'message' => 'Ename cannot be empty'
					),
					'maxLength' => array(
							'rule' => array('maxLength', 256),
							'message' => 'Message is too long'
					)
			),
			'text' => array(
					'notEmpty' => array(
							'rule' => array('notEmpty'),
							'message' => 'Text cannot be empty'
					)
			),
			'address' => array(
					'notEmpty' => array(
							'rule' => array('notEmpty'),
							'message' => 'Address cannot be empty'
					),
					'maxLength' => array(
							'rule' => array('maxLength', 256),
							'message' => 'Message is too long'
					)
			),
			'date' => array(
					'date' => array(
							'rule' => 'datetime',
							'message' => 'Incorrect date format'
					)
			)
	);
	//If no message indicated, the name of the block will be displayed.


	/**
	 * hasMany associations
	 *
	 * @var array
	 */


	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'users_events',
			'foreignKey' => 'event_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'InvitedToEvent' => array(
          'className' => 'Invitedto',
          'joinTable' => 'invitedto',
          'foreignKey' => 'event_id',
          'associationForeignKey' => 'user_id'
         ),
		'RequestInviteToEvent' => array(
          'className' => 'Requestinvite',
          'joinTable' => 'requestinvites',
          'foreignKey' => 'event_id',
          'associationForeignKey' => 'user_id'
          )
	);
}
