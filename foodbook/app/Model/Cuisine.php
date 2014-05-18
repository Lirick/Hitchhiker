<?php
App::uses('AppModel', 'Model');
/**
 * Cuisine Model
 *
 * @property Event $Event
 */
class Cuisine extends AppModel {
	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
			'Event' => array(
					'className' => 'Event',
					'joinTable' => 'cuisines_events',
					'foreignKey' => 'cuisine_id',
					'associationForeignKey' => 'event_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);
	
}
