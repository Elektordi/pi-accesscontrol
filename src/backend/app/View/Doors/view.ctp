<div class="doors view">
<h2><?php  echo __('Door'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($door['Door']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($door['Door']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($door['Door']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Port'); ?></dt>
		<dd>
			<?php echo h($door['Door']['port']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Version'); ?></dt>
		<dd>
			<?php echo h($door['Door']['version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastseen'); ?></dt>
		<dd>
			<?php echo h($door['Door']['lastseen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Config'); ?></dt>
		<dd>
			<?php echo h($door['Door']['config']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Door'), array('action' => 'edit', $door['Door']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Door'), array('action' => 'delete', $door['Door']['id']), null, __('Are you sure you want to delete # %s?', $door['Door']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Doors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Door'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Logs'); ?></h3>
	<?php if (!empty($door['Log'])): ?>
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
		foreach ($door['Log'] as $log): ?>
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
<div class="related">
	<h3><?php echo __('Related Rights'); ?></h3>
	<?php if (!empty($door['Right'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Door Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($door['Right'] as $right): ?>
		<tr>
			<td><?php echo $right['id']; ?></td>
			<td><?php echo $right['group_id']; ?></td>
			<td><?php echo $right['door_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rights', 'action' => 'view', $right['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rights', 'action' => 'edit', $right['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rights', 'action' => 'delete', $right['id']), null, __('Are you sure you want to delete # %s?', $right['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Right'), array('controller' => 'rights', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
