<div class="videos index">
	<h2><?php echo __('Vídeos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('ordem'); ?></th>
			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
			<th><?php echo $this->Paginator->sort('Tema'); ?></th>
			<th><?php echo $this->Paginator->sort('criado'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($videos as $video): ?>
	<tr>
		<td><?php echo h($video['Video']['id']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['nome']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['ordem']); ?>&nbsp;</td>
		<td><?php echo $video['Video']['ativo'] == '' ? 'Inativo' : 'Ativo'; ?>&nbsp;</td>
		<td><?php echo h($video['VideosTema']['nome']); ?>&nbsp;</td>
		<td><?php echo date('d/m/Y H:i:s', strtotime($video['Video']['criado'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $video['Video']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $video['Video']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $video['Video']['id']), null, __('Você tem certeza que deseja deletar esse vídeo?', $video['Video']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}.')
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
