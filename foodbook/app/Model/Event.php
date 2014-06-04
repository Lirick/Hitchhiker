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
	 * Note: custom messages won't pop up if the rule coincides with the default browser's one,
	 * e.g.: notEmpty => required attribute
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
// 			'date' => array(
// 					'date' => array(
// 							'rule' => 'datetime',
//							'message' => 'Incorrect date format'
// 					)
// 			),
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

	/**
	 * belongsTo association
	 * 
	 * @var array
	 */
	public $belongsTo = array(
        'EventHost' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'fields' => array(
                'name',
			'username',
			'email',
			'phone',
			'picture') 
        )
    );

	
	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'event_id',	
			'dependent' => true,
			'order' => 'Comment.id DESC')
	);

	
	/**
	 * hasOne associations
	 * @var array
	 */
	public $hasOne = array(
		'Location' => array(
			'className' => 'Location',
			'joinTable' => 'locations',
			'dependent' => true,
			'foreignKey' => 'id'			
		)
	);
	
	
	
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
          'fields' => array(
          	'id',
			'username',
			'email',
			'phone',
			'picture') 
          ),
		'GoingToEvent' => array(
          'className' => 'User',
          'joinTable' => 'goingtos',
          'foreignKey' => 'event_id',
          'associationForeignKey' => 'user_id',
          'unique' => 'keepExisting',
          'fields' => array(
          	'id',
			'username',
			'email',
			'phone',
			'picture') 
          )
	);
}
