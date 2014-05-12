<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property inviter_user_id $Invite
 * @property Event $Event
 */
class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array('rule' => array('notEmpty'),'message' => 'A username is required'),
            'unique' => array('rule' => array('isUnique'),'message' => 'Username already exists')
        ),
        'password' => array(
            'required' => array('rule' => array('notEmpty'),'message' => 'A password is required'),
            'length' => array('rule' => array('minLength', 8),'message' => 'Minimum length is 8 characters')
        )
    );


	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
		    $passwordHasher = new SimplePasswordHasher();
		    $this->data[$this->alias]['password'] = $passwordHasher->hash(
		        $this->data[$this->alias]['password']
		    );
		}
		return true;
	}

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'phone';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		'InvitedTo' => array(
          'className' => 'User',
          'joinTable' => 'invitedto',
          'foreignKey' => 'user_id',
          'associationForeignKey' => 'event_id'
          ),
		'RequestInvite' => array(
          'className' => 'User',
          'joinTable' => 'requestinvites',
          'foreignKey' => 'user_id',
          'associationForeignKey' => 'event_id'
          )
	);

}
