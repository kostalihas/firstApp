<div class="users form">
<h1>Enter Your Username</h1>
<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'forgot_password'))); ?>
	<?php echo $this->Form->input('User.username', array('label' => 'Username', 'between'=>'<br />', 'type'=>'text')); ?>
	<?php echo $this->Form->submit('Send Password Reset Instructions', array('class' => 'submit', 'id' => 'submit')); ?>
<?php echo $this->Form->end(); ?>
</div>