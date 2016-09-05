<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property User $User
 */
class Group extends AppModel {
/**
 * [$actsAs description]
 * @var array
 */
// public $actsAs = array('Acl' => array('type' => 'requester'));
/**
 * [parentNode description]
 * @return [type] [description]
 */
// public function parentNode() {
//         return null;
//     }
// /**
//  * [beforeFilter description]
//  * @return [type] [description]
//  */
// public function beforeFilter() {
//     parent::beforeFilter();
//     // Pour CakePHP 2.1 et supérieurs
//     $this->Auth->allow();
// }

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
