<div id='login'>
<?php
	echo $this->Form->create();
		echo $this->Form->input('login');
		echo $this->Form->input('senha');
	echo $this->Form->end('Login');

?>
</div>