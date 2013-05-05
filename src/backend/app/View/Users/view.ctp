<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin'); ?></dt>
		<dd>
			<?php echo h($user['User']['admin']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cards'); ?></h3>
	<?php if (!empty($user['Card'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Uid'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Blocked'); ?></th>
		<th><?php echo __('Ref'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Card'] as $card): ?>
		<tr>
			<td><?php echo $card['id']; ?></td>
			<td><?php echo $card['uid']; ?></td>
			<td><?php echo $card['user_id']; ?></td>
			<td><?php echo $card['blocked']; ?></td>
			<td><?php echo $card['ref']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cards', 'action' => 'view', $card['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cards', 'action' => 'edit', $card['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cards', 'action' => 'delete', $card['id']), null, __('Are you sure you want to delete # %s?', $card['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Web Logs'); ?></h3>
	<?php if (!empty($user['WebLog'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Timestamp'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('Object'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['WebLog'] as $webLog): ?>
		<tr>
			<td><?php echo $webLog['id']; ?></td>
			<td><?php echo $webLog['timestamp']; ?></td>
			<td><?php echo $webLog['user_id']; ?></td>
			<td><?php echo $webLog['action']; ?></td>
			<td><?php echo $webLog['object']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'web_logs', 'action' => 'view', $webLog['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'web_logs', 'action' => 'edit', $webLog['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'web_logs', 'action' => 'delete', $webLog['id']), null, __('Are you sure you want to delete # %s?', $webLog['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Web Log'), array('controller' => 'web_logs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
