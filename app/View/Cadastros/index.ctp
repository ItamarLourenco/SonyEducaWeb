<div class="cadastros index">
	<h2><?php echo __('Cadastros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('login'); ?></th>
			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
			<th><?php echo $this->Paginator->sort('criado'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
	</tr>
	<?php foreach ($cadastros as $cadastro): ?>
	<tr>
		<td><?php echo h($cadastro['Cadastro']['id']); ?>&nbsp;</td>
		<td><?php echo h($cadastro['Cadastro']['nome']); ?>&nbsp;</td>
		<td><?php echo h($cadastro['Cadastro']['login']); ?>&nbsp;</td>
		<td><?php echo $cadastro['Cadastro']['ativo'] == '' ? 'Inativo' : 'Ativo';?></td>
		<td><?php echo date('d/m/Y H:i:s', strtotime($cadastro['Cadastro']['criado']));?></td>


		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $cadastro['Cadastro']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cadastro['Cadastro']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $cadastro['Cadastro']['id']), null, __('Você tem certeza que deseja deletar esse cadatro?')); ?>
		</td>
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
		echo $this->Paginator->next(__('Proximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php echo $this->element('menu');?>