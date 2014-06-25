<div class="usuarios view">
<h2><?php echo __('Usuários'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Senha'); ?></dt>
		<dd>
			******
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo $usuario['Usuario']['ativo'] == '' ? 'Inativo' : 'Ativo'; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Criado'); ?></dt>
		<dd>
			<?php echo h(date('d/m/Y H:i:s', strtotime($usuario['Usuario']['criado']))); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('menu');?>