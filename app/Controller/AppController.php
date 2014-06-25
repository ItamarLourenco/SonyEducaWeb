<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array('Form' => array('className' => 'FormBR'));

	public function validate_login(){
		$session_login = $this->Session->read('login');

		if(!isset($session_login) && $this->params['action'] != 'login'){
			$this->Session->setFlash(__('Acesso negado, por favor realize o login.'));
			return $this->redirect(array('controller' => 'painel'));
		}
	}

	public function getUser($valor = null){
		if(isset($valor))
		{
			$session_login = $this->Session->read('login');
			return $session_login['Usuario'][$valor];
		}
	}
}
