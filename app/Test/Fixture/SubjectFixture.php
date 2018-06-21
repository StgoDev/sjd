<?php
/**
 * Subject Fixture
 */
class SubjectFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'nomedisciplina' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'nomeprofessor' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 555, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'nomemonitor' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 555, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cargahoraria' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'subjects_FKIndex1' => array('column' => 'course_id', 'unique' => 0)
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
			'course_id' => 1,
			'nomedisciplina' => 'Lorem ipsum dolor sit amet',
			'nomeprofessor' => 'Lorem ipsum dolor sit amet',
			'nomemonitor' => 'Lorem ipsum dolor sit amet',
			'cargahoraria' => 1,
			'created' => '2017-04-03 02:16:27',
			'modified' => '2017-04-03 02:16:27'
		),
	);

}
