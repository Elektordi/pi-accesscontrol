<div class="rights index">
	<h2><?php echo __('Rights'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('door_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($rights as $right): ?>
	<tr>
		<td><?php echo h($right['Right']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($right['Group']['name'], array('controller' => 'groups', 'action' => 'view', $right['Group']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($right['Door']['name'], array('controller' => 'doors', 'action' => 'view', $right['Door']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $right['Right']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $right['Right']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $right['Right']['id']), null, __('Are you sure you want to delete # %s?', $right['Right']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Right'), array('action' => 'add')); ?></li>
	</ul>
</div>
