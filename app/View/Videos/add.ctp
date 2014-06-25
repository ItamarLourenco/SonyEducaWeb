<div class="videos form">
<?php echo $this->Form->create('Video', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Vídeo'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('valor');
		echo $this->Form->input('descricao');
		echo $this->Form->input('ordem', array('label' => 'Ordem: <span style="font-size:10px;">(Ex.: Aula 01, Aula 02, Aula 03)</span>'));
		echo $this->Form->input('tags', array('type' => 'text'));
		echo $this->Form->input('videos_tema_id', array('options' => $temas_videos));
		echo $this->Form->input('ativo', array('checked'));

		echo $this->Form->file('video');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<?php echo $this->element('menu');?>