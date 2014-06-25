<div class="videos form">
<?php echo $this->Form->create('Video', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar vídeo '). $this->Form->value('nome'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('valor');
		echo $this->Form->input('descricao');
		echo $this->Form->input('ordem', array('label' => 'Ordem: <span style="font-size:10px;">(Ex.: Aula 01, Aula 02, Aula 03)</span>'));
		echo $this->Form->input('tags', array('type' => 'text'));
		echo $this->Form->input('videos_tema_id', array('options' => $temas_videos));
		echo $this->Form->input('ativo');


		echo $this->Form->file('video');
	?>
	<video width="320" height="240" controls>
		<source src="<?php echo $this->webroot.'upload_videos/'.$this->Form->value('arquivo'); ?>" type="video/mp4">
		Seu navegador não suporta vídeos
	</video>

	<?php echo $this->Html->image('/upload_imgs/'.$this->Form->value('arquivo_img'));?>
	<?php echo $this->Html->link('Editar imagem.', array('controller' => 'videos', 'action' => 'thumb/'.$this->Form->value('id')));?>

	</fieldset>
<?php echo $this->Form->end(__('Editar')); ?>
</div>
<?php echo $this->element('menu');?>
