<div class="compras form">
<?php echo $this->Form->create('Compra'); ?>
	<fieldset>
		<legend><?php echo __('Add Compra'); ?></legend>
	<?php
		echo $this->Form->input('usuarios_id');
		echo $this->Form->input('videos_id');
		echo $this->Form->input('cadastros_id');
		echo $this->Form->input('valor_compra');
		echo $this->Form->input('ativo');
		echo $this->Form->input('criado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Compras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuarios'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Videos'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
