<div class="cadastros form">
<?php echo $this->Form->create('Cadastro'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Cadastro'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('login');
		echo $this->Form->input('senha');
		echo $this->Form->input('ativo', array('checked'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<?php echo $this->element('menu');?>