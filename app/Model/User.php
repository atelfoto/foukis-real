<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 * @property Post $Post
 */
class User extends AppModel {
/**
 * Display field
 *
 * @var string
 */
public $displayField = 'name';
/**
 * [beforeSave description]
 * @param  array  $options [description]
 * @return [type]          [description]
 */
public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }
/**
 * Validation rules
 *
 * @var array
 */
public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'This field must not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'This field must not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mail' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'You must enter a valid email address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'password' => array(
		// 	'minLength' => array(
		// 		'rule' => array('minLength'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
	);

// The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * [$actsAs description]
 * @var array
 */
//public $actsAs = array('Acl' => array('type' => 'requester'));
// public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
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
/**
 * [parentNode description]
 * @return [type] [description]
 */
// public function parentNode() {
// 	if (!$this->id && empty($this->data)) {
// 		return null;
// 	}
// 	if (isset($this->data['User']['group_id'])) {
// 		$groupId = $this->data['User']['group_id'];
// 	} else {
// 		$groupId = $this->field('group_id');
// 	}
// 	if (!$groupId) {
// 		return null;
// 	}
// 	return array('Group' => array('id' => $groupId));
// }

// public function bindNode($user) {
//     return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
// }

// /**
//  * [beforeFilter description]
//  * @return [type] [description]
//  */
// public function beforeFilter() {
//     parent::beforeFilter();
//     // Pour CakePHP 2.1 et supérieurs
//     $this->Auth->allow();
// }


}
