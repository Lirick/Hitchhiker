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
			),
			'min_guests' => array(
					'notEmpty' => array(
							'rule' => array('notEmpty'),
							'message' => 'Please specify a minimum number of guests'
							),
					'numeric' => array(
							'rule' => array('numeric'),
							'message' => 'Invalid number'
							)
					),
			'max_guests' => array(
					'notEmpty' => array(
							'rule' => array('notEmpty'),
							'message' => 'Please specify a maximum number of guests'
							),
					'numeric' => array(
							'rule' => array('numeric'),
							'message' => 'Invalid number'
							)							
					),
			'price_per_guest' => array(
					'numeric' => array(
							'rule' => array('numeric'),
							'message' => 'Invalid number'
							)
					)
					
	);
	//If no message indicated, the name of the block will be displayed.


	public $belongsTo = array(
        'EventHost' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
        )
    );

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
		'Cuisine' => array(
			'className' => 'Cuisine',
			'joinTable' => 'cuisines_events',
			'foreignKey' => 'event_id',
			'associationForeignKey' => 'cuisine_id'
		),
		'InvitedToEvent' => array(
          'className' => 'User',
          'joinTable' => 'invitedto',
          'foreignKey' => 'event_id',
          'associationForeignKey' => 'user_id',
          'unique' => 'keepExisting',
         ),
		'RequestInviteToEvent' => array(
          'className' => 'User',
          'joinTable' => 'requestinvites',
          'foreignKey' => 'event_id',
          'associationForeignKey' => 'user_id',
          'unique' => 'keepExisting',
          )
	);
}
