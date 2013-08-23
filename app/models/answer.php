<?php
class Answer extends AppModel {
	var $name = 'Answer';
	var $validate = array(
		'choice_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid choice ID specified.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'poll_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid poll ID specified.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Choice' => array(
			'className' => 'Choice',
			'foreignKey' => 'choice_id',			
            'counterCache'=>true,
			'fields' => '',
			'order' => ''
		),
		'Poll' => array(
			'className' => 'Poll',
			'foreignKey' => 'poll_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
