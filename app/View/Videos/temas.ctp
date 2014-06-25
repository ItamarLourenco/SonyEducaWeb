<div class="videos index">
	<h2><?php echo __('Temas de Vídeos'); ?></h2>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('criado'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($temas as $tema): ?>
	<tr>
		<td><?php echo h($tema['VideosTema']['id']); ?>&nbsp;</td>
		<td><?php echo h($tema['VideosTema']['nome']); ?>&nbsp;</td>
		<td><?php echo date('d/m/Y H:i:s', strtotime($tema['VideosTema']['criado'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('controller' => 'videos', 'action' => 'temas/edd', $tema['VideosTema']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete_tema', $tema['VideosTema']['id']), null, __('Você tem certeza que deseja deletar esse tema?', $tema['VideosTema']['id'])); ?>
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
