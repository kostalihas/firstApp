
<div id="breadcrumb-container" class="span12 visible-desktop" >
	<div class="breadcrumb">

		<a href="/aclbake/pages/home">
		<i class="icon-home "></i>
		</a>
		<span class="divider">/</span>
		<a href="/aclbake/users">Users</a>
		<span class="divider">/</span>
		<?php echo $user['User']['username'] ?>
		</div>


<div class="row-fluid">
	<div class="span8">

		<ul class="nav nav-tabs">
		<li class="active"><a href="#user-main" data-toggle="tab">User</a></li>		</ul>

		
		<div class="tab-content">
		<div id="user-main" class="tab-pane active">
		
		<input type="hidden" name="<?php echo $user['User']['username']; ?>" class="input-block-level" id="<?php echo $user['User']['id']; ?>"/>
		
<div class="input text required">

<label for="UserRoleId">Role</label>
<input name="data[Group][name]"
 class="input-block-level" maxlength="50" type="text" value="<?php echo $user['Group']['name'] ?>" id="UserRoleId" required="required"/>
</div>

<div class="input text required">

<label for="Userid">ID</label>
<input name="<?php echo $user['User']['id']; ?>" class="input-block-level" maxlength="50" type="text" value="<?php echo $user['User']['id'] ?>" id="Userid" required="required"/>
</div>

<div class="input text required">

<label for="UserName">Username</label>
<input name="<?php echo $user['User']['username'] ?>" class="input-block-level" maxlength="50" type="text" value="<?php echo $user['User']['username'] ?>" id="UserName" required="required"/>
</div>

<div class="input email required">

<label for="UserEmail">Email</label>
<input name="<?php echo $user['User']['email'] ?>" class="input-block-level" maxlength="100" type="email" value="<?php echo $user['User']['email'] ?>" id="UserEmail" required="required"/>
</div>

<div class="input text">
<label for="UserPassword">Password</label>
<input class="input-block-level" maxlength="100" type="text" value="<?php echo $user['User']['password'] ?>" id="UserPassword" required="required"/>
</div>

<div class="input text">

<label for="UserCreated">Created</label>
<input name="<?php echo $user['User']['created']; ?>" class="input-block-level" maxlength="100" value="<?php echo $user['User']['created']; ?>" type="text" id="UserCreated"/>
</div>

<div class="input text">

<label for="UserModified">Modified</label>
<input name="<?php echo $user['User']['modified']; ?>" class="input-block-level" maxlength="100" value="<?php echo $user['User']['modified'] ?>" type="text" id="UserModified"/>
</div>

</div>
</div>
</div>
</div>

<?php echo $this->Html->link(__('Export to PDF'), array('action' => 'view', $user['User']['id'], 'ext' => 'pdf'),array('class'=>' btn btn-primary btn-lg')); ?>


<div class="row-fluid">
	<div class="col-md-12">
		<table class="table table-striped">

	<h3><?php echo __('Related Posts'); ?></h3>
	
	<?php if (!empty($user['Post'])): ?>
	
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['user_id']; ?></td>
			<td><?php echo $post['title']; ?></td>
			<td><?php echo $post['body']; ?></td>
			<td><?php echo $post['created']; ?></td>
			<td><?php echo $post['modified']; ?></td>
			<td class="actions">
			
			<div class="item-actions">
		<a href="/aclbake/posts/view/<?php echo $post['id']; ?>" class="view" title="view this item" rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="fa fa-align-justify icon-large"></i></a>
		
		<a href="/aclbake/posts/edit/<?php echo $post['id']; ?>" class="edit" title="Edit this item" rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="icon-pencil icon-large"></i></a>
		
		<?php echo $this->Form->postLink(
   $this->Html->tag('i','', array('class' => 'icon-trash icon-large')),
        array('action' => 'delete',$post['id'] ),
        array('class' => 'delete','escape'=>false,'title'=>'Remove this item','rel'=>'tooltip','data-placement'=>'top','data-trigger'=>'hover'),
    __('Are you sure you want to delete # %s?'), $post['id']); ?>
	</div>
			
			</td>
		</tr>
	<?php endforeach; ?>
	

<?php endif; ?>
</table>
	</div>


	
		<ul>
			<?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add'),array('class'=>' btn btn-primary btn-lg')); ?>
		</ul>
	
</div>

</div>