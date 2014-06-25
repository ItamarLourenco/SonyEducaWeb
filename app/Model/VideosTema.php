<?php
App::uses('AppModel', 'Model');
/**
 * VideosTema Model
 *
 */
class VideosTema extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'videos_tema';

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
		'id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alias' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
	);

	public function getVideosTemas(){
		return $this->find('list', array(
			'fields' => array('id', 'nome')
		));
	}

	public function save($data = null, $validate = true, $fieldList = Array()){
		unset($this->data['VideosTema']['criado']);
		if(sizeof($this->findByNome($data['VideosTema']['nome'])) <= 0){
			return parent::save($data, $validate, $fieldList);
		}else{
			return false;
		}
	}
}
