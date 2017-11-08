<?php
App::uses('MetaOrder', 'Model');

/**
 * MetaOrder Test Case
 *
 */
class MetaOrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.meta_order',
		'app.product',
		'app.category',
		'app.user',
		'app.role',
		'app.permission',
		'app.content',
		'app.order',
		'app.purchase',
		'app.customer',
		'app.bill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MetaOrder = ClassRegistry::init('MetaOrder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MetaOrder);

		parent::tearDown();
	}

}
