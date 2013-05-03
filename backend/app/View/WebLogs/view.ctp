<div class="webLogs view">
<h2><?php  echo __('Web Log'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($webLog['WebLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestamp'); ?></dt>
		<dd>
			<?php echo h($webLog['WebLog']['timestamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($webLog['User']['name'], array('controller' => 'users', 'action' => 'view', $webLog['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($webLog['WebLog']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Object'); ?></dt>
		<dd>
			<?php echo h($webLog['WebLog']['object']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Web Log'), array('action' => 'edit', $webLog['WebLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Web Log'), array('action' => 'delete', $webLog['WebLog']['id']), null, __('Are you sure you want to delete # %s?', $webLog['WebLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Web Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Web Log'), array('action' => 'add')); ?> </li>
	</ul>
</div>
