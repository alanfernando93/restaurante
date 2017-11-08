<?php
/**
 * PurchaseFixture
 *
 */
class PurchaseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'customer_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
		'product_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
		'bill_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'created' => '2016-11-13 17:37:22',
			'modified' => '2016-11-13 17:37:22',
			'customer_id' => 1,
			'product_id' => 1,
			'bill_id' => 1,
			'user_id' => 1
		),
	);

}
