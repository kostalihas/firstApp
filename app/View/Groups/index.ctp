<div id="breadcrumb-container" class="span12 visible-desktop" >
	<div class="breadcrumb">
		<a href="/aclbake/pages/home">
		<i class="icon-home icon-large"></i>
		</a>
		<span class="divider">/</span>
		<a href="/aclbake/groups">Groups</a>
		
		</div>
	
	<div class="col-md-12">
	
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($groups as $group): ?>
	<tr>
		<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
		<td class="actions">
		
		<div class="item-actions">
		<a href="/aclbake/groups/view/<?php echo $group['Group']['id']; ?>" class="view" title="view this item" rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="fa fa-align-justify icon-large"></i></a>
		
		<a href="/aclbake/groups/edit/<?php echo $group['Group']['id']; ?>" class="edit" title="Edit this item" rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="icon-pencil icon-large"></i></a>
			
			
			<?php echo $this->Form->postLink(
   $this->Html->tag('i','', array('class' => 'icon-trash icon-large')),
        array('action' => 'delete', $group['Group']['id']),
        array('class' => 'delete','escape'=>false,'title'=>'Remove this item','rel'=>'tooltip','data-placement'=>'top','data-trigger'=>'hover'),
    __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
	
			
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev btn btn-sm btn-primary'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next btn btn-sm btn-primary'));
	?>
	</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>