<?php
App::uses('AppController', 'Controller');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 * @property PaginationComponent $Pagination
 * @property SessionComponent $Session
 */
class UsuariosController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html', 'Js', 'Time');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');


	public function beforeFilter(){
		$this->validate_login();

		$this->loadModel('UsuariosTipo');
		$this->set('options_usuarios_tipo', $this->UsuariosTipo->getUsuariosTipo());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Usuário Inválido'));
		}
		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário salvo com sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Esse Login já existe, por favor escolha outro.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Usuário Inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário editado com sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro, por favor tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Usuário Inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('Usuário deletado com sucesso!'));
		} else {
			$this->Session->setFlash(__('Erro, por favor tente novamente'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function login(){
		if($this->request->is('post'))
		{
			$data = $this->data;
			$data['Usuario']['senha'] = md5($this->data['Usuario']['senha']);
			$login = $this->Usuario->find('first', array(
				'conditions' => $data['Usuario']
			));
			
			if(!empty($login))
			{
				if($login['Usuario']['login'] === $data['Usuario']['login'] && $login['Usuario']['senha'] === $data['Usuario']['senha'])
				{
					$this->Session->write('login', $login);
					return $this->redirect(array('action' => 'index'));
				}
			}
			$this->Session->setFlash(__('Erro na autenticação por favor tente novamente.'));			
		}
	}

	public function logoff(){
		$this->Session->destroy();
		return $this->redirect(array('controller' => 'painel'));		
	}
}
