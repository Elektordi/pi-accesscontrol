<div class="rights form">
<?php echo $this->Form->create('Right'); ?>
	<fieldset>
		<legend><?php echo __('Edit Right'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('door_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Right.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Right.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rights'), array('action' => 'index')); ?></li>
	</ul>
</div>
