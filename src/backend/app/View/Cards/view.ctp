<div class="cards view">
<h2><?php  echo __('Card'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($card['Card']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uid'); ?></dt>
		<dd>
			<?php echo h($card['Card']['uid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($card['User']['name'], array('controller' => 'users', 'action' => 'view', $card['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blocked'); ?></dt>
		<dd>
			<?php echo h($card['Card']['blocked']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ref'); ?></dt>
		<dd>
			<?php echo h($card['Card']['ref']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Card'), array('action' => 'edit', $card['Card']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Card'), array('action' => 'delete', $card['Card']['id']), null, __('Are you sure you want to delete # %s?', $card['Card']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Logs'); ?></h3>
	<?php if (!empty($card['Log'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Timestamp'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Door Id'); ?></th>
		<th><?php echo __('Result'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($card['Log'] as $log): ?>
		<tr>
			<td><?php echo $log['id']; ?></td>
			<td><?php echo $log['timestamp']; ?></td>
			<td><?php echo $log['action']; ?></td>
			<td><?php echo $log['card_id']; ?></td>
			<td><?php echo $log['door_id']; ?></td>
			<td><?php echo $log['result']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'logs', 'action' => 'view', $log['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'logs', 'action' => 'edit', $log['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'logs', 'action' => 'delete', $log['id']), null, __('Are you sure you want to delete # %s?', $log['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
