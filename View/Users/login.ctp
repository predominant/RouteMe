<?php
echo $this->Form->create();
	echo $this->Form->inputs(array(
		'legend' => 'Login',
		'username',
		'password'
	));
echo $this->Form->end('Login', array('class' => 'primary'));
?>