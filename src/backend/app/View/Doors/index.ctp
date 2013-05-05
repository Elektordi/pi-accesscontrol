<div class="doors index">
	<h2><?php echo __('Doors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('ip'); ?></th>
			<th><?php echo $this->Paginator->sort('port'); ?></th>
			<th><?php echo $this->Paginator->sort('version'); ?></th>
			<th><?php echo $this->Paginator->sort('lastseen'); ?></th>
			<th><?php echo $this->Paginator->sort('config'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($doors as $door): ?>
	<tr>
		<td><?php echo h($door['Door']['id']); ?>&nbsp;</td>
		<td><?php echo h($door['Door']['name']); ?>&nbsp;</td>
		<td><?php echo h($door['Door']['ip']); ?>&nbsp;</td>
		<td><?php echo h($door['Door']['port']); ?>&nbsp;</td>
		<td><?php echo h($door['Door']['version']); ?>&nbsp;</td>
		<td><?php echo h($door['Door']['lastseen']); ?>&nbsp;</td>
		<td><?php echo h($door['Door']['config']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $door['Door']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $door['Door']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $door['Door']['id']), null, __('Are you sure you want to delete # %s?', $door['Door']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Door'), array('action' => 'add')); ?></li>
	</ul>
</div>
