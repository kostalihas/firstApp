

	<div class="breadcrumb">
		<a href="/aclbake/pages/home">
		<i class="icon-home"></i>
		</a>
		<span class="divider">/</span>
		<a href="/aclbake/users">Users</a>
		<span class="divider">/</span>
		<a href="/aclbake/users/add">Add</a>
		</div>
	<div class="row-fluid">
		<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('group_id');
	?>
	</fieldset>
	<button class="btn btn-success" type="submit">Save</button>

</div>


		</div>