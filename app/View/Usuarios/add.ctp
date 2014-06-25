<div class="usuarios form">
<?php echo $this->Form->create('Usuario'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Usuário'); ?></legend>
	<?php
		echo $this->Form->input('login');
		echo $this->Form->input('senha');
		echo $this->Form->input('ativo', array('checked'));
		echo $this->Form->input('usuarios_tipo_id', array('options' => $options_usuarios_tipo));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<?php echo $this->element('menu');?>