
<div id="user-login">
<div class="box">
<?php
echo $this->Form->create('User', array('action' => 'login')); ?>

<div class="box-content">
<div class="input-prepend text required">
<span class="add-on">
<i class="icon-user"></i>
</span>
<input id="UserUsername" class="span11" type="text" required="required" maxlength="60" data-title="Username"
 data-trigger="focus" data-placement="right" placeholder="Username (admin)" name="data[User][username]">
</div>

<div class="input-prepend password required">
	<span class="add-on">
	<i class="icon-key"></i></span>
	<input type="password" required="required" id="UserPassword" data-title="Password"
	data-trigger="focus" data-placement="right" class="span11" placeholder="Password" name="data[User][password]">
</div>

	<?php echo $this->Form->input('remember', array(
    'label' => "Remember me ",
    'type' => "checkbox" )); ?>
	
<button class="btn btn-default" type="submit">Log In</button>
<a class="forgot" href="/aclbake/users/forgot_password">Forgot password?</a>
    
</div>
</div>
</div>