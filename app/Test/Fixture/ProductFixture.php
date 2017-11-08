<?php

/**
 * ProductFixture
 *
 */
class ProductFixture extends CakeTestFixture {

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 9, 'key' => 'primary'),
        'descripcion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
        'stock' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
        'precio' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'category_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
        'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
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
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'stock' => 1,
            'precio' => 1,
            'created' => '2016-11-13 17:31:23',
            'modified' => '2016-11-13 17:31:23',
            'category_id' => 1,
            'user_id' => 1
        ),
    );

}
