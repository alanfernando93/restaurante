<?php
/**
 * MetaOrderFixture
 *
 */
class MetaOrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 9, 'key' => 'primary'),
		'cantidad' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
		'product_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
		'precio' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'order_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'id' => 1,
			'cantidad' => 1,
			'product_id' => 1,
			'precio' => 1,
			'order_id' => 1
		),
	);

}
