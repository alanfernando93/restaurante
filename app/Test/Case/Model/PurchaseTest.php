<?php
App::uses('Purchase', 'Model');

/**
 * Purchase Test Case
 *
 */
class PurchaseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.purchase',
		'app.customer',
		'app.product',
		'app.category',
		'app.user',
		'app.bill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Purchase = ClassRegistry::init('Purchase');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Purchase);

		parent::tearDown();
	}

}
