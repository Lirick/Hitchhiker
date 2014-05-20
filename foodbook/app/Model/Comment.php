<?php
App::uses('AppModel', 'Model');

/**
 * Event Comment Model
 *
 */
class Comment extends AppModel {

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
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id'
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);
}
