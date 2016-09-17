<?php
/**
 * Property Fixture
 */
class PropertyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'id2' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'content' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'area_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'characteristics_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'dateYear' => array('type' => 'text', 'null' => false, 'default' => null, 'length' => 4),
		'bedrooms' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'size' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'level' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'price' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'online' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'media_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'mediaQuantities' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => false),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'modified_by' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'states_id' => array('column' => 'state_id', 'unique' => 0),
			'areas_id' => array('column' => 'area_id', 'unique' => 0),
			'status_id' => array('column' => 'status_id', 'unique' => 0),
			'type_id' => array('column' => 'type_id', 'unique' => 0),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'media_id' => array('column' => 'media_id', 'unique' => 0),
			'characteristics_id' => array('column' => 'characteristics_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'id2' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'state_id' => 1,
			'area_id' => 1,
			'status_id' => 1,
			'type_id' => 1,
			'characteristics_id' => 1,
			'dateYear' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'bedrooms' => 1,
			'size' => 1,
			'level' => 'Lorem ipsum dolor sit amet',
			'price' => '',
			'online' => 1,
			'media_id' => 1,
			'mediaQuantities' => 1,
			'modified' => '2016-09-17 20:02:38',
			'created' => 1474135358,
			'user_id' => 1,
			'modified_by' => 'Lorem ipsum dolor sit amet'
		),
	);

}
