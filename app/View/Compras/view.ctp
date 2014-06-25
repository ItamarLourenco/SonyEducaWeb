<div class="compras view">
<h2><?php echo __('Compra'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuarios'); ?></dt>
		<dd>
			<?php echo $this->Html->link($compra['Usuarios']['id'], array('controller' => 'usuarios', 'action' => 'view', $compra['Usuarios']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Videos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($compra['Videos']['id'], array('controller' => 'videos', 'action' => 'view', $compra['Videos']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cadastros Id'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['cadastros_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Compra'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['valor_compra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Criado'); ?></dt>
		<dd>
			<?php echo h($compra['Compra']['criado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Compra'), array('action' => 'edit', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Compra'), array('action' => 'delete', $compra['Compra']['id']), null, __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Compras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuarios'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Videos'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
