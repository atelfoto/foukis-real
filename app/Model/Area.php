<?php
App::uses('AppModel', 'Model');
/**
 * Area Model
 *
 * @property Property $Property
 */
class Area extends AppModel {

	/**
 * [$actsAs description]
 * @var array
 */
	public $actsAs = array(
		'Sluggable.Sluggable' => array(
	        'field'     => 'name',  // Field that will be slugged
	        'slug'      => 'slug',  // Field that will be used for the slug
	        'lowercase' => true,    // Do we lowercase the slug ?
	        'separator' => '-',     //
	        'overwrite' => false    // Does the slug is auto generated when field is saved no matter what
		),
		'Containable'
	);

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

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
		'Property' => array(
			'className' => 'Property',
			'foreignKey' => 'area_id',
			'dependent' => true,
			'conditions' => array('Property.online' => 1),
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
