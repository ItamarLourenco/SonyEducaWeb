<div class="cadastros view">
<h2><?php echo __('Cadastro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cadastro['Cadastro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($cadastro['Cadastro']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($cadastro['Cadastro']['login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Criado'); ?></dt>
		<dd>
			<?php echo h( date('d/m/Y H:i:s', strtotime($cadastro['Cadastro']['criado']))); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('menu');?>	