<?php
App::uses('AppModel', 'Model');
/**
 * Cadastro Model
 *
 */
class Cadastro extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'login' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'senha' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public function save($data = null, $validate = true, $fieldList = Array()){
		unset($this->data['Cadastro']['criado']);

		if($data['Cadastro']['senha'] != '******'){
			$data['Cadastro']['senha'] = md5($data['Cadastro']['senha']);
		}else{
			unset($data['Cadastro']['senha']);
		}

		if(sizeof($this->findByLogin($data['Cadastro']['login'])) <= 0 || isset($data['Cadastro']['id'])){
			return parent::save($data, $validate, $fieldList);
		}else{
			return false;
		}
	}
}
