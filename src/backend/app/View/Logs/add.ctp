<div class="logs form">
<?php echo $this->Form->create('Log'); ?>
	<fieldset>
		<legend><?php echo __('Add Log'); ?></legend>
	<?php
		echo $this->Form->input('timestamp');
		echo $this->Form->input('action');
		echo $this->Form->input('card_id');
		echo $this->Form->input('door_id');
		echo $this->Form->input('result');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Logs'), array('action' => 'index')); ?></li>
	</ul>
</div>
