	<div class="breadcrumb">
		<a href="/aclbake/pages/home">
		<i class="icon-home icon-large"></i>
		</a>
		<span class="divider">/</span>
		<a href="/aclbake/users">Users</a>
		
		</div>
		
		<div class="row-fluid">
	<div class="actions span12">
		<div class="btn-group">
		<a href="/aclbake/users/add" method="get" class="btn btn-success">New User</a>
		</div>	
		</div>
</div>
	
	<div class="col-md-12">
	
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
		<td class="actions">
		
		<div class="item-actions">
		
		<a href="/aclbake/users/view/<?php echo $user['User']['id']; ?>" class="view" title="view this user" rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="fa fa-align-justify icon-large"></i></a>
		
		<a href="/aclbake/users/edit/<?php echo $user['User']['id']; ?>" class="edit" title="Edit this user" rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="icon-pencil icon-large"></i></a>
			
			<?php echo $this->Form->postLink(
   $this->Html->tag('i','', array('class' => 'icon-trash icon-large')),
        array('action' => 'delete', $user['User']['id']),
        array('class' => 'delete','escape'=>false,'title'=>'Remove this user','rel'=>'tooltip','data-placement'=>'top','data-trigger'=>'hover'),
    __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
	
	 
	<div class="tooltip" role="tooltip">
	<div class="tooltip-arrow"></div>
	<div class="tooltip-inner"> </div></div>
	
	
	
			
</div>
			
			</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	</div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev  btn btn-sm btn-primary'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next btn btn-sm btn-primary'));
	?>

</div>