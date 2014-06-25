<?php
App::uses('AppController', 'Controller');
/**
 * Compras Controller
 *
 * @property Compra $Compra
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ComprasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Compra->recursive = 0;
		$this->set('compras', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Compra->exists($id)) {
			throw new NotFoundException(__('Invalid compra'));
		}
		$options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
		$this->set('compra', $this->Compra->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Compra->create();
			if ($this->Compra->save($this->request->data)) {
				$this->Session->setFlash(__('The compra has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The compra could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Compra->Usuario->find('list');
		$videos = $this->Compra->Video->find('list');
		$this->set(compact('usuarios', 'videos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Compra->exists($id)) {
			throw new NotFoundException(__('Invalid compra'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Compra->save($this->request->data)) {
				$this->Session->setFlash(__('The compra has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The compra could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
			$this->request->data = $this->Compra->find('first', $options);
		}
		$usuarios = $this->Compra->Usuario->find('list');
		$videos = $this->Compra->Video->find('list');
		$this->set(compact('usuarios', 'videos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Compra->id = $id;
		if (!$this->Compra->exists()) {
			throw new NotFoundException(__('Invalid compra'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Compra->delete()) {
			$this->Session->setFlash(__('The compra has been deleted.'));
		} else {
			$this->Session->setFlash(__('The compra could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function ws($id = null){
		$this->autoRender = false;
		$this->response->type('json');

		$url = Router::url('/', true) . 'upload_videos' . DS;
		$url_img = Router::url('/', true) . 'upload_imgs' . DS;

		$compras = $this->Compra->find('all', array(
			'fields' => array(
				'Videos.id', 'Videos.nome', 'Videos.valor', 'Videos.descricao', 'Videos.tags', 'Videos.ordem',
				"CONCAT('{$url_img}', Videos.arquivo_img) As arquivo_img", "CONCAT('{$url}', Videos.arquivo) As arquivo"
			),
			'conditions' => array('Compra.cadastros_id' => $id, 'Compra.ativo' => true),
			'order' => array('Videos.videos_tema_id', 'Videos.ordem')
		));		

		foreach($compras As $i => $compra){
			$compras[$i]['Videos']['arquivo'] 	  = $compra[0]['arquivo'];
			$compras[$i]['Videos']['arquivo_img'] = $compra[0]['arquivo_img'];
			unset($compras[$i][0]);
		}

		$this->response->body(json_encode($compras));
	}


	public function saveWs(){
		$this->autoRender = false;
		$this->response->type('json');
		if ($this->request->is('post')) 
		{
			$json = $this->request->data['json'];

			$compras_save = array('Compra' => json_decode($json, true));
			$compras_save['Compra']['valor_compra'] = number_format($compras_save['Compra']['valor_compra'], 2);

			$compras_save['Compra']['ativo'] = true;
			$compras_save['Compra']['criado'] = date('Y-m-d H:i:s');

			$this->Compra->create();
			if($this->Compra->save($compras_save)){
				$this->response->body(json_encode(array('status' => '1', 'msg' => 'Compra realizada com sucesso!')));
			}else{
				$this->response->body(json_encode(array('status' => '0', 'msg' => 'Ocorreu um erro na sua compra, por favor tente novamente!')));
			}
		}
	}

	public function check(){
		$this->autoRender = false;
		$this->response->type('json');
		$compra = false;
		if($this->request->is('post'))
		{
			$json = $this->request->data['json'];

			$check = json_decode($json);
		
			$compra = $this->Compra->find('count', array(
				'conditions' => array('Compra.videos_id' => $check->videos_id, 'Compra.cadastros_id' => $check->cadastros_id)
			));

			$compra = ($compra == 1 ? true : false);

			if($compra){
				$this->response->body(json_encode(array('status' => $compra, 'msg' => 'Video comprado!')));
			}else{
				$this->response->body(json_encode(array('status' => $compra, 'msg' => 'Video não comprado!')));
			}
		}else{
			$this->response->body(json_encode(array('status' => $compra, 'msg' => 'Video não comprado!')));
		}
	}

}