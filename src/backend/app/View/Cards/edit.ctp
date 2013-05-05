<div class="cards form">
<?php echo $this->Form->create('Card'); ?>
	<fieldset>
		<legend><?php echo __('Edit Card'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('uid');
		echo $this->Form->input('user_id');
		echo $this->Form->input('blocked');
		echo $this->Form->input('ref');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Card.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Card.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cards'), array('action' => 'index')); ?></li>
	</ul>
</div>
