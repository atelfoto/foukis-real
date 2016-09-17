<?php
App::uses('Characteristic', 'Model');

/**
 * Characteristic Test Case
 */
class CharacteristicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.characteristic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Characteristic = ClassRegistry::init('Characteristic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Characteristic);

		parent::tearDown();
	}

}
