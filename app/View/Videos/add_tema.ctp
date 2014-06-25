<div class="videos form">
<?php echo $this->Form->create('VideosTema'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Tema de Vídeo'); ?></legend>
	<?php
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>

<?php echo $this->element('menu');?>