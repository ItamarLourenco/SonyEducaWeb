<?php
App::uses('AppModel', 'Model');
/**
 * Usuario Model
 *
 * @property UsuariosTipo $UsuariosTipo
 */
class Usuario extends AppModel {

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
		'usuarios_tipo_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
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
				'message' => 'Por favor, verifique seu e-mail',
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
		'ativo' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'UsuariosTipo' => array(
			'className' => 'UsuariosTipo',
			'foreignKey' => 'usuarios_tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public function save($data = null, $validate = true, $fieldList = Array()){
		unset($this->data['Usuario']['criado']);
		if($data['Usuario']['senha'] != '******'){
			$data['Usuario']['senha'] = md5($data['Usuario']['senha']);
		}else{
			unset($data['Usuario']['senha']);
		}
		
		if(sizeof($this->findByLogin($data['Usuario']['login'])) <= 0 || isset($data['Usuario']['id'])){
			return parent::save($data, $validate, $fieldList);
		}else{
			return false;
		}
	}

}
