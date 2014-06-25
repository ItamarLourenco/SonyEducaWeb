
<div class="compras index">
	<h2><?php echo __('Compras'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Video.nome'); ?></th>
			<th><?php echo $this->Paginator->sort('Cadastro.nome'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_compra'); ?></th>
			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
			<th><?php echo $this->Paginator->sort('criado'); ?></th>
			<!-- <th class="actions"><?php echo __('Ações'); ?></th> -->
	</tr>
	<?php foreach ($compras as $compra): ?>
	<tr>
		<td><?php echo h($compra['Compra']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($compra['Videos']['nome'], array('controller' => 'videos', 'action' => 'view', $compra['Videos']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($compra['Cadastros']['nome'], array('controller' => 'cadastros', 'action' => 'view', $compra['Cadastros']['id'])); ?>
		</td>
		<td><?php echo h($compra['Compra']['valor_compra']); ?>&nbsp;</td>
		<td><?php echo h($compra['Compra']['ativo'] == '' ? 'Inativo' : 'Ativo'); ?>&nbsp;</td>
		<td><?php echo h(date('d/m/Y H:i:s', strtotime($compra['Compra']['criado']))); ?>&nbsp;</td>

		<?php /*
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $compra['Compra']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $compra['Compra']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $compra['Compra']['id']), null, __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?>
		</td>
		 */?>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Proxima') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php echo $this->element('menu');?>