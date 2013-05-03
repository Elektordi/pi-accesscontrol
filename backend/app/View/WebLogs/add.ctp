<div class="webLogs form">
<?php echo $this->Form->create('WebLog'); ?>
	<fieldset>
		<legend><?php echo __('Add Web Log'); ?></legend>
	<?php
		echo $this->Form->input('timestamp');
		echo $this->Form->input('user_id');
		echo $this->Form->input('action');
		echo $this->Form->input('object');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Web Logs'), array('action' => 'index')); ?></li>
	</ul>
</div>
