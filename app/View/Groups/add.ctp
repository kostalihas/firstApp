
	<div class="breadcrumb">
		<a href="/aclbake/pages/home">
		<i class="icon-home "></i>
		</a>
		<span class="divider">/</span>
		<a href="/aclbake/groups">Groups</a>
		<span class="divider">/</span>
		<a href="/aclbake/groups/add">Add</a>
		</div>
	
<div class="row-fluid">
<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<button class="btn btn-success" type="submit">Submit</button>
</div>

</div>