<?php
App::import('Helper', 'Form');
App::import('Controller', 'USuariosTipo');
class FormBRHelper extends FormHelper{
	public function input($fieldName, $option = Array()){
		if($fieldName == 'senha'){
			$option['type'] = 'password';
		}
		return parent::input($fieldName, $option);
	}
}