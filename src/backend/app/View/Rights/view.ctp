<div class="rights view">
<h2><?php  echo __('Right'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($right['Right']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($right['Group']['name'], array('controller' => 'groups', 'action' => 'view', $right['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Door'); ?></dt>
		<dd>
			<?php echo $this->Html->link($right['Door']['name'], array('controller' => 'doors', 'action' => 'view', $right['Door']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Right'), array('action' => 'edit', $right['Right']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Right'), array('action' => 'delete', $right['Right']['id']), null, __('Are you sure you want to delete # %s?', $right['Right']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rights'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Right'), array('action' => 'add')); ?> </li>
	</ul>
</div>
