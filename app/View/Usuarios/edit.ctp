<div class="usuarios form">
<?php echo $this->Form->create('Usuario'); ?>
	<fieldset>
		<legend><?php echo __('Editar Usuário'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('login');
		echo $this->Form->input('senha', array('value' => '******'));
		echo $this->Form->input('ativo');
		echo $this->Form->input('usuarios_tipo_id', array('options' => $options_usuarios_tipo));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar')); ?>
</div>
<?php echo $this->element('menu');?>