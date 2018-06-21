<?php
/**
 * Student Fixture
 */
class StudentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'room_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'nome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 555, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'nomeguerra' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'antiguidade' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'nascimento' => array('type' => 'date', 'null' => true, 'default' => null),
		'rg' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'inclusao' => array('type' => 'date', 'null' => true, 'default' => null),
		'unidade' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'students_FKIndex1' => array('column' => 'room_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'room_id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'nomeguerra' => 'Lorem ipsum dolor sit amet',
			'antiguidade' => 1,
			'nascimento' => '2017-04-03',
			'rg' => 'Lorem ipsum dolor ',
			'inclusao' => '2017-04-03',
			'unidade' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-04-03 02:15:55',
			'modified' => '2017-04-03 02:15:55'
		),
	);

}
