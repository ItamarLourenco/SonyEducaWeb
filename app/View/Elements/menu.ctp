<div class="actions">
	<h3><?php echo __('Usuários'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Mostrar Usuário'), array('controller' => 'usuarios/')); ?></li>
		<li><?php echo $this->Html->link(__('Adicionar Usuário'), array('controller' => 'usuarios', 'action' => 'add')); ?></li>
	</ul>
	<br />
	<hr />
	<br />
	<h3><?php echo __('Vídeos'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Mostrar Vídeos'), array('controller' => 'videos', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Adicionar Vídeo'), array('controller' => 'videos', 'action' => 'add')); ?></li>
		<li><hr /></li>
		<li><?php echo $this->Html->link(__('Mostrar Temas'), array('controller' => 'videos', 'action' => 'temas')); ?></li>
		<li><?php echo $this->Html->link(__('Adicionar Temas'), array('controller' => 'videos', 'action' => 'temas/add')); ?></li>
	</ul>
	<br />
	<hr />
	<br />
	<h3><?php echo __('Cadastros'); ?></h3>

	<ul>
		<li><?php echo $this->Html->link(__('Mostrar Cadastros'), array('controller' => 'cadastros', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Adicionar Cadastro'), array('controller' => 'cadastros', 'action' => 'add')); ?></li>
	</ul>
	<br />
	<hr />
	<br />
	<h3><?php echo __('Compras'); ?></h3>

	<ul>
		<li><?php echo $this->Html->link(__('Mostrar Compras'), array('controller' => 'compras', 'action' => 'index')); ?></li>
	</ul>
</div>