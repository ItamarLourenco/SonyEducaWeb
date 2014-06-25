<?php
App::uses('AppController', 'Controller');
/**
 * Cadastros Controller
 *
 * @property Cadastro $Cadastro
 * @property PaginatorComponent $Paginator
 */
class CadastrosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cadastro->recursive = 0;
		$this->set('cadastros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cadastro->exists($id)) {
			throw new NotFoundException(__('Invalid cadastro'));
		}
		$options = array('conditions' => array('Cadastro.' . $this->Cadastro->primaryKey => $id));
		$this->set('cadastro', $this->Cadastro->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cadastro->create();
			if ($this->Cadastro->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro salvo com sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Esse login, já existe, por favor escolha outro.'));
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
		if (!$this->Cadastro->exists($id)) {
			throw new NotFoundException(__('Invalid cadastro'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cadastro->save($this->request->data)) {
				$this->Session->setFlash(__('Cadastro editado com sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro, por favor tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Cadastro.' . $this->Cadastro->primaryKey => $id));
			$this->request->data = $this->Cadastro->find('first', $options);
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
		$this->Cadastro->id = $id;
		if (!$this->Cadastro->exists()) {
			throw new NotFoundException(__('Invalid cadastro'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cadastro->delete()) {
			$this->Session->setFlash(__('Cadastro deletado com sucesso!'));
		} else {
			$this->Session->setFlash(__('Ocorreu um erro, por favor tente novamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function saveWs()
	{
		$this->autoRender = false;
		$this->response->type('json');

		if ($this->request->is('post')) 
		{
			$json = $this->request->data['json'];


			$json = json_decode($json);
			$cadastro_save = array(
				'Cadastro' => array(
					'nome' => $json->nome,
					'login' => $json->email,
					'senha' => $json->senha,
					'ativo' => true
				)
			);

			$this->Cadastro->create();
			if($this->Cadastro->save($cadastro_save)){
				$cadastro = $this->Cadastro->findById($this->Cadastro->getLastInsertId());
				$this->response->body(json_encode(array('status' => '1', 'msg' => 'Cadastro salvo com sucesso!', 'object' => $cadastro['Cadastro'])));
			}else{
				$this->response->body(json_encode(array('status' => '0', 'msg' => 'Esse e-mail já está cadastro, por favor escolha outro!')));
			}
		}else{
			$this->response->body(json_encode(array('status' => '0', 'msg' => 'Desculpe ocorreu um erro, tente novamente!')));
		}
	}


	public function ws()
	{
		$this->autoRender = false;
		$this->response->type('json');

		if($this->request->is('post'))
		{
			$login = $this->request->data['login'];
			$senha = $this->request->data['senha'];

			$cadastro = $this->Cadastro->find('first', array(
				'conditions' => array('Cadastro.login' => $login)
			));

			if($cadastro != false)
			{
				if($cadastro['Cadastro']['senha'] == md5($senha)){
					unset($cadastro['Cadastro']['senha']);
					$this->response->body(json_encode(array('status' => '1', 'msg' => 'Login realizado com sucesso!', 'object' => $cadastro['Cadastro'])));
				}else{
					$this->response->body(json_encode(array('status' => '0', 'msg' => 'Login/Senha incorretos!')));
				}	
			}else{
				$this->response->body(json_encode(array('status' => '0', 'msg' => 'Login/Senha incorretos!')));
			}
		}else{
			$this->response->body(json_encode(array('status' => '0', 'msg' => 'Desculpe ocorreu um erro, tente novamente!')));
		}
	}
}