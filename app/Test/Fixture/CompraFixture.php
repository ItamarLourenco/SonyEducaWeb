<?php
/**
 * CompraFixture
 *
 */
class CompraFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'usuarios_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'videos_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cadastros_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'valor_compra' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,2'),
		'ativo' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'criado' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
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
			'usuarios_id' => 1,
			'videos_id' => 1,
			'cadastros_id' => 1,
			'valor_compra' => 1,
			'ativo' => 1,
			'criado' => 1398733131
		),
	);

}
