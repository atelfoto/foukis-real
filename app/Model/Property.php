<?php
App::uses('AppModel', 'Model');

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Property Model
 *
 * @property State $State
 * @property Area $Area
 * @property Status $Status
 * @property Type $Type
 * @property Characteristic $Characteristic
 * @property Media $Media
 * @property User $User
 * @property Characteristic $Characteristic
 */
class Property extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * [$actsAs description]
 * @var array
 */
  	public $actsAs = array(
        'Search.Searchable',
        'Containable'
    );

/**
 * afterFind callback
 *
 * @param $results array
 * @param $primary boolean
 * @return mixed
 */
   public function afterFind($results, $primary = false){
        foreach($results as $k=>$result){
            if(isset($result[$this->alias]['id'])){
            	$results[$k][$this->alias]['link']  = array('controller' => 'properties', 'action' => 'view', 'id' =>$result[$this->alias]['id']);
               // $results[$k][$this->alias]['photo'] = 'photos/' . ceil($result[$this->alias]['id']/1000) . '/' . $result[$this->alias]['id'] . '.jpg';
               // $results[$k][$this->alias]['meta']  = 'photos/' . ceil($result[$this->alias]['id']/1000) . '/' . $result[$this->alias]['id'] . '_meta.jpg';
               // $results[$k][$this->alias]['thumb'] = 'photos/' . ceil($result[$this->alias]['id']/1000) . '/' . $result[$this->alias]['id'] . '_thumb.jpg';
            }
        }
        return $results;
    }
/**
 * [beforeDelete description]
 * @param  boolean $cascade [description]
 * @return [type]           [description]
 */
	public function beforeDelete($cascade = true){
		$property = $this->read('Property.id');
		$id =$property['Property']['id'];
		$file = WWW_ROOT .'img'.DS.'properties'.DS.$id.DS;
		$fileThumbs = WWW_ROOT .'img'.DS.'properties'.DS.$id.DS.'thumbs'.DS;
		foreach(glob($file.'*.jpg') as $v){
			unlink($v);
		}
		foreach(glob($fileThumbs.'*.jpg') as $v){
		  	unlink($v);
		}
		$folderThumbs = WWW_ROOT .'img'.DS.'properties'.DS.$id.DS.'thumbs';
		if (file_exists($folderThumbs)) {
		  	rmdir($folderThumbs);
		  	$folder= WWW_ROOT .'img'.DS.'properties'.DS.$id;
		  	if (file_exists($folder)) {
		  		rmdir($folder);
		  	}
		}
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
				'message' => 'This field can not stay empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			// 'lengthBetween' => array(
			// 	'rule' => array('lengthBetween',5,15),
			// 	'message' => 'Between 5 and 15 characters',
			// 	//'allowEmpty' => false,
			// 	//'required' => false,
			// 	//'last' => false, // Stop validation after this rule
			// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		),
	    'Characteristic' => array(
	        'rule' => array('multiple', array(
	          //  'in'  => array('do', 'ré', 'mi', 'fa', 'sol', 'la', 'si'),
	            'min' => 1,
	        //    'max' => 3
	        )),
	        'message' => 'Merci de choisir au moins une options'
	    ),
		'type_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'This field can not stay empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'state_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'This field can not stay empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'area_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'This field can not stay empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'This field can not stay empty',
				//'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'dateYear' => array(
			'date' => array(
				'rule' => array('date','y'),
				'message' => 'Please select a year',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'bedrooms' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Thank you to submit the number of rooms',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'size' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field must be numeric',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'level' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field must be numeric',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			// 'numeric' => array(
			// 	'rule' => array('numeric'),
			// 	//'message' => 'Your custom message here',
			// 	//'allowEmpty' => false,
			// 	//'required' => false,
			// 	//'last' => false, // Stop validation after this rule
			// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		'money' => array(
			'rule' => array('money'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			// 'decimal' => array(
			// 	'rule' => array('decimal'),
			// 	//'message' => 'Your custom message here',
			// 	//'allowEmpty' => false,
			// 	//'required' => false,
			// 	//'last' => false, // Stop validation after this rule
			// 	//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		// 'Media' => array(
		// 	'className' => 'Media',
		// 	'foreignKey' => 'media_id',
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => ''
		// ),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Characteristic' => array(
			'className' => 'Characteristic',
			'joinTable' => 'characteristics_properties',
			'foreignKey' => 'property_id',
			'associationForeignKey' => 'characteristic_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	public $filterArgs = array(
		'name' => array(
			'field' => 'Property.name',
			'type' => 'like'
			),
		'size' => array(
			'field' => 'Property.size >=',
			'type' => 'value'
			),
		'price' => array(
			'field' => 'Property.price <=',
			'type' => 'value'
			),
		'bedrooms' => array(
			'field' => 'Property.bedrooms >=',
			'type' => 'value'
			),
		'state_id' => array(
			'field' => 'Property.state_id',
			'type' => 'like',
			//'formField' => 'blog_input',
           // 'modelField' => 'value',
           // 'model' => 'Area'
			),
		'area_id' => array(
			'field' => 'Property.area_id',
			'type' => 'like',
			//'formField' => 'blog_input',
           // 'modelField' => 'value',
           // 'model' => 'Area'
			),
		'type_id' => array(
			'field' => 'Property.type_id',
			'type' => 'like'
			),
		'status_id' => array(
			'field' => 'Property.status_id',
			'type' => 'like'
			)
		);
}
