<?php
class UploadVideoHelper extends FormHelper{
	public function upload($file = null)
	{
		if(isset($file))
		{
			$nome = $this->gerarNome($file['name']);
			$dir = WWW_ROOT.'upload_videos'.DS.$nome;
			if($file['type'] == 'video/mp4')
			{
				if(move_uploaded_file($file['tmp_name'], $dir))
				{
					return $nome;
				}
			}
		}	
		return false;
	}

	public function gerarNome($nome = null)
	{
		$name = md5(time().rand(0, 999999));
		$ext = pathinfo($nome, PATHINFO_EXTENSION);
		return $name.'.'.$ext;
	}

	public function deletar($nome){
		$dir = WWW_ROOT.'upload_videos'.DS.$nome;
		if(file_exists($dir)){
			return unlink($dir);
		}else{
			return false;
		}
	}

	public function deletarImg($nome){
		$dir = WWW_ROOT.'upload_imgs'.DS.$nome;
		if(file_exists($dir)){
			return unlink($dir);
		}else{
			return false;
		}
	}

	public function transformBase64ToPng($base64 = null){
		$nome = $this->gerarNome('foto.png');
		$dir = WWW_ROOT.'upload_imgs'.DS.$nome;
		$data = base64_decode($base64);
		$success = file_put_contents($dir, $data);
		return $nome;
	}
}