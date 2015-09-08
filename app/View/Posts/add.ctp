<div id="breadcrumb-container" class="span12 visible-desktop" >
	<div class="breadcrumb">
		<a href="/aclbake/pages/home">
		<i class="icon-home "></i>
		</a>
		<span class="divider">/</span>
		<a href="/aclbake/posts">Posts</a>
		<span class="divider">/</span>
		<a href="/aclbake/posts/add">Add</a>
		</div>

<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<button class="btn btn-success" type="submit">Submit</button>
</div>

</div>