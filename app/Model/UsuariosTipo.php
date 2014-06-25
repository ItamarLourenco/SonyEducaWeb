<?php
App::uses('AppModel', 'Model');
/**
 * UsuariosTipo Model
 *
 */
class UsuariosTipo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'usuarios_tipo';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	public function getUsuariosTipo(){
		return $this->find('list', array(
			'fields' => array('id','nome'),
			'order' => array('id' => 'desc')
		));
	}
}
