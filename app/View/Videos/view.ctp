<div class="videos view">
<h2><?php echo __('Vídeo '.$video['Video']['nome']); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($video['Video']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($video['Usuarios']['login'], array('controller' => 'usuarios', 'action' => 'view', $video['Usuarios']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($video['Video']['nome']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($video['Video']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordem'); ?></dt>
		<dd>
			<?php echo h($video['Video']['ordem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo $video['Video']['ativo'] == '' ? 'Inativo' : 'Ativo'; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Criado'); ?></dt>
		<dd>
			<?php echo h(date('d/m/Y H:i:s', strtotime($video['Video']['criado']))); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visualizar vídeo:'); ?></dt>
		<dd>
			<video width="320" height="240" controls>
  				<source src="<?php echo $this->webroot.'upload_videos/'.$video['Video']['arquivo']; ?>" type="video/mp4">
				Seu navegador não suporta vídeos
			</video>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagem do vídeo:'); ?></dt>
		<dd>
			<?php echo $this->Html->image('/upload_imgs/'.$video['Video']['arquivo_img']);?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('menu');?>
