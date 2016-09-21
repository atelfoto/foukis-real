<?php
App::uses('CharacteristicProperty', 'Model');

/**
 * CharacteristicProperty Test Case
 */
class CharacteristicPropertyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.characteristic_property',
		'app.property',
		'app.state',
		'app.area',
		'app.status',
		'app.type',
		'app.characteristic',
		'app.user',
		'app.group',
		'app.post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CharacteristicProperty = ClassRegistry::init('CharacteristicProperty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CharacteristicProperty);

		parent::tearDown();
	}

}
