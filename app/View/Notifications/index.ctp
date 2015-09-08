<div class="breadcrumb">
		<a href="/aclbake/pages/home">
		<i class="icon-home icon-large"></i>
		</a>
		<span class="divider">/</span>
		<a href="/aclbake/notifications">Notifications</a>
		
		</div>
		
		<div class="row-fluid">
	<div class="actions span12">
		<div class="btn-group">
		<a href="/aclbake/notifications/add" method="get" class="btn btn-success">New Notification</a>
		</div>	
		</div>
</div>
	
	<div class="col-md-12">
	
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('message'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lu'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($notifications as $notification): ?>
	<tr>
		<td><?php echo h($notification['Notification']['id']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['title']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['message']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($notification['User']['username'], array('controller' => 'users', 'action' => 'view', $notification['User']['id'])); ?>
		</td>
		<td><?php echo h($notification['Notification']['lu']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['type']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['created']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<div class="item-actions">

				<a href="/aclbake/notifications/view/<?php echo $notification['Notification']['id']; ?>" class="view" title="view this notification"
					rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="fa fa-align-justify icon-large"></i></a>
		
		<a href="/aclbake/notifications/edit/<?php echo $notification['Notification']['id']; ?>" class="edit" title="Edit this notification"
			rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="icon-pencil icon-large"></i></a>

			<?php echo $this->Form->postLink(
   $this->Html->tag('i','', array('class' => 'icon-trash icon-large')),
        array('action' => 'delete',$notification['Notification']['id']),
        array('class' => 'delete','escape'=>false,'title'=>'Remove this notification','rel'=>'tooltip','data-placement'=>'top','data-trigger'=>'hover'),
    __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?>

			
		</div>
		</td>

	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	

		<div class="row-fluid">
			<div class="span12">
				<div class="pagination">
<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
</p>

	<ul>
<li class="prev">
	
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev  btn btn-sm btn-primary'));
		?>
		</li>
		<li>
		<?php
		echo $this->Paginator->numbers(array('separator' => '') ,array('class' => 'prev  btn btn-sm btn-primary'));
		?>
	</li>
	
<li class="next">
	<?php
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'prev  btn btn-sm btn-primary'));
	?>
</li>
</ul>
</div>

	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Notification'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
