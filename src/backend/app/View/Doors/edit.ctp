<div class="doors form">
<?php echo $this->Form->create('Door'); ?>
	<fieldset>
		<legend><?php echo __('Edit Door'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('ip');
		echo $this->Form->input('port');
		echo $this->Form->input('version');
		echo $this->Form->input('lastseen');
		echo $this->Form->input('config');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('menubox'); ?>	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Door.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Door.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Doors'), array('action' => 'index')); ?></li>
	</ul>
</div>
