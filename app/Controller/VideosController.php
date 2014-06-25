<?php
App::uses('AppController', 'Controller');
/**
 * Videos Controller
 *
 * @property Video $Video
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class VideosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $uses = array('Video', 'VideosTema');
	public $helpers = array('UploadVideo');

	public function beforeFilter(){
		$this->set('temas_videos', $this->VideosTema->getVideosTemas());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Video->recursive = 0;
		$this->set('videos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
		$this->set('video', $this->Video->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$view = new View($this);
			$uplaod_video = $view->loadHelper('UploadVideo');
			$nome = $uplaod_video->upload($this->data['Video']['video']);
			if($nome != false)
			{
				$this->Video->create();
				$data = $this->data;
				$data['Video']['arquivo'] = $nome;
				$data['Video']['usuarios_id'] = $this->getUser('id');

				if ($this->Video->save($data)) {
					$this->Session->setFlash(__('Vídeo salvo com sucesso!.'));

					
					return $this->redirect(array('controller' => 'videos', 'action' => 'thumb/'.$this->Video->getInsertID()));
				} else {
					$this->Session->setFlash(__('Vídeo não salvo, verifique se o arquivo está no formato mp4 e por favor tente novamente.'));
				}
			}else{
				$this->Session->setFlash(__('Vídeo não salvo, por favor tente novamente.'));
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
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$data = $this->data;
			if($this->data['Video']['video']['name'] != '' && !isset($this->data['Video']['video']['erro']))
			{
				$video = $this->Video->findById($this->data['Video']['id']);
				$video_nome = $video['Video']['arquivo'];
				$view = new View($this);
				$uplaod_video = $view->loadHelper('UploadVideo');				

				$uplaod_video->deletar($video_nome); // Apagamndo arquivo	
				$nome = $uplaod_video->upload($this->data['Video']['video']);
				$data['Video']['arquivo'] = $nome;
			}

			if ($this->Video->save($data)) {
				$this->Session->setFlash(__('Vídeo editado com sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Desculpe, ocorreu um erro. tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
			$this->request->data = $this->Video->find('first', $options);
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
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->request->onlyAllow('post', 'delete');


		$video = $this->Video->findById($id);
		$video_nome = $video['Video']['arquivo'];
		$img_nome = $video['Video']['arquivo_img'];

		$view = new View($this);
		$uplaod_video = $view->loadHelper('UploadVideo');
		$uplaod_video->deletar($video_nome); // Apagamndo arquivo	

		$uplaod_video->deletarImg($img_nome); // Apagamndo thumb

		if ($this->Video->delete()) {
			$this->Session->setFlash(__('Vídeo deletado com sucesso!'));

		} else {
			$this->Session->setFlash(__('Desculpe, ocorreu um erro tente novamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function temas(){
		$this->Paginator->settings = $this->paginate;
		$temas = $this->Paginator->paginate('VideosTema');
		$this->set('temas', $temas);
	}

	public function add_tema()
	{
		if ($this->request->is('post')) {
			$this->VideosTema->create();
			if ($this->VideosTema->save($this->request->data)) {
				$this->Session->setFlash(__('Tema de vídeo adicionar com sucesso!'));
				return $this->redirect(array('action' => 'temas'));
			} else {
				$this->Session->setFlash(__('Esse tema já existe, por favor escolha outro.'));
			}
		}
	}

	public function edit_tema($id = null)
	{
		if (!$this->VideosTema->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->VideosTema->save($this->request->data)) {
				$this->Session->setFlash(__('Tema de vídeo editado com sucesso!'));
				return $this->redirect(array('action' => 'temas'));
			} else {
				$this->Session->setFlash(__('Esse tema já existe, por favor tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('VideosTema.' . $this->VideosTema->primaryKey => $id));
			$this->request->data = $this->VideosTema->find('first', $options);
		}
	}

	public function delete_tema($id = null){
		$this->VideosTema->id = $id;
		if(!$this->VideosTema->exists()){
			throw new NotFoundException(__('Tema não existe'));
		}

		$this->request->onlyAllow('post', 'delete');
		if($this->VideosTema->delete()){
			$this->Session->setFlash(__('Tema de vídeo deletado com sucesso!'));
		}else{
			$this->Session->setFlash(__('Desculpe, ocorreu um erro, por favor tente novamente!'));
		}
		return $this->redirect(array('action' => 'temas'));
	}

	public function ws($search = null){
		$this->autoRender = false;
	    $this->response->type('json');

		if(is_null($search)){
			$search = '';
		}

		$url = Router::url('/', true) . 'upload_videos' . DS;
		$url_img = Router::url('/', true) . 'upload_imgs' . DS;
		$videos = $this->Video->find('all', array(
			'fields' => array(
				'Video.id', 'Video.nome', 'Video.valor', 'Video.descricao', 'Video.tags', 'Video.ordem',
				'VideosTema.nome',
				"CONCAT('{$url_img}', Video.arquivo_img) As arquivo_img", "CONCAT('{$url}', Video.arquivo) As arquivo"
			),
			'conditions' => array(
				"Video.nome LIKE '%$search%'",
				"Video.ativo" => true
			),
			'order' => array('Video.videos_tema_id', 'Video.ordem')
		));

		foreach($videos As $i => $video){
			$videos[$i]['Video']['arquivo'] = $videos[$i][0]['arquivo'];
			$videos[$i]['Video']['arquivo_img'] = $videos[$i][0]['arquivo_img'];
			unset($videos[$i][0]);
		}
		
		$this->response->body(json_encode($videos));
	}


	public function temasWs($search = null){
		$this->autoRender = false;
		$this->response->type('json');

		if(is_null($search)){
			$search = ''; 
		}

		$temas = $this->VideosTema->find('all', array(
			'fields' => array('VideosTema.nome'),
			'conditions' => array("VideosTema.nome LIKE '%$search%'")
		));

		$this->response->body(json_encode($temas));
	}

	public function videoById($id = null){
		$this->autoRender = false;
		$this->response->type('json');

		$this->Video->id = $id;

		$url = Router::url('/', true) . 'upload_videos' . DS;
		$video = $this->Video->find('first', array(
			'fields' => array('Video.id', 'Video.nome', 'Video.valor', 'Video.descricao', 'Video.tags', "CONCAT('{$url}', Video.arquivo) As arquivo", 'VideosTema.nome'),
		));
		$video['Video']['arquivo'] = $video[0]['arquivo'];
		unset($video[0]);

		$this->response->body(json_encode($video));
	}


	public function thumb($id = null){
		if($this->request->is('post'))
		{	
			$view = new View($this);
			$uplaod_video = $view->loadHelper('UploadVideo');
			
			$nome = $uplaod_video->transformBase64ToPng($this->data['Video']['img_base64']);
			$id = $this->data['Video']['id'];

			$data_save = array('id' => $id, 'arquivo_img' => $nome);


			if($this->Video->save($data_save)){
				$this->Session->setFlash('Imagem salva com sucesso!');
				return $this->redirect(array('controller' => 'videos', 'action' => 'index'));
			}else{
				$this->Session->setFlash('Erro ao salvar imagem.');
				return $this->redirect(array('controller' => 'videos', 'action' => 'index'));
			}
		}else{
			$video = $this->Video->find('first', array(
				'conditions' => array('Video.id' => $id)
			));
			$this->data = $video;
			$this->set('video', $video);

		}
		
	}
}




