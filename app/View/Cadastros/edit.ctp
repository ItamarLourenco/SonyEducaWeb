<div class="cadastros form">
<?php echo $this->Form->create('Cadastro'); ?>
	<fieldset>
		<legend><?php echo __('Editar Cadastro'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('login');
		echo $this->Form->input('senha', array('value' => '******'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar')); ?>
</div>
<?php echo $this->element('menu');?>