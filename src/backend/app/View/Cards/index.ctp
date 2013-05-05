<div class="cards index">
	<h2><?php echo __('Cards'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('uid'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('blocked'); ?></th>
			<th><?php echo $this->Paginator->sort('ref'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cards as $card): ?>
	<tr>
		<td><?php echo h($card['Card']['id']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['uid']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($card['User']['name'], array('controller' => 'users', 'action' => 'view', $card['User']['id'])); ?>
		</td>
		<td><?php echo h($card['Card']['blocked']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['ref']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $card['Card']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $card['Card']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $card['Card']['id']), null, __('Are you sure you want to delete # %s?', $card['Card']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Card'), array('action' => 'add')); ?></li>
	</ul>
</div>
