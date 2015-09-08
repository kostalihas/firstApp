<div id="breadcrumb-container" class="span12 visible-desktop" >
	<div class="breadcrumb">
		<a href="/aclbake/pages/home">
		<i class="icon-home icon-large"></i>
		</a>
		<span class="divider">/</span>
		<a href="/aclbake/posts">Posts</a>
		
		</div>
	
	<div class="col-md-12">
	
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
		</td>
		<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['body']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
		<td class="actions">
	
		
		<div class="item-actions">
		<a href="/aclbake/posts/view/<?php echo $post['Post']['id']; ?>" class="view" title="view this item" rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="fa fa-align-justify icon-large"></i></a>
		
		<a href="/aclbake/posts/edit/<?php echo $post['Post']['id']; ?>" class="edit" title="Edit this item" rel="tooltip" data-placement="top" data-trigger="hover">
		<i class="icon-pencil icon-large"></i></a>
		
		<?php echo $this->Form->postLink(
   $this->Html->tag('i','', array('class' => 'icon-trash icon-large')),
        array('action' => 'delete',$post['Post']['id'] ),
        array('class' => 'delete','escape'=>false,'title'=>'Remove this item','rel'=>'tooltip','data-placement'=>'top','data-trigger'=>'hover'),
    __('Are you sure you want to delete # %s?'), $post['Post']['id']); ?>
			
			
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

</div>
