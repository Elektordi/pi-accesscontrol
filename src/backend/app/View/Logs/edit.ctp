
<div id="page-container" class="row">
	
	<div id="page-content">
		<div class="logs form">
                    
                    		
			<?php echo $this->MyForm->create('Log', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
				<fieldset>

                                    <div class="btn-toolbar pull-right">
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Retour fiche Log'), array('action' => 'view', $log['Log']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                    </div>
                    
                                                                        <h2><?php  echo __('Modifier Log').': '.$log['Log']['id']; ?></h2>
                                    			<div class="form-group">
	<?php echo $this->MyForm->label('timestamp', 'Timestamp');?>
		<?php echo $this->MyForm->input('timestamp', array('class' => 'form-control', 'value' => (empty($default_timestamp)?null:$default_timestamp))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('action', 'Action');?>
		<?php echo $this->MyForm->input('action', array('class' => 'form-control', 'value' => (empty($default_action)?null:$default_action))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('card_id', 'Card Id');?>
		<?php echo $this->MyForm->input('card_id', array('class' => 'form-control', 'value' => (empty($default_card_id)?null:$default_card_id))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('door_id', 'Door Id');?>
		<?php echo $this->MyForm->input('door_id', array('class' => 'form-control', 'value' => (empty($default_door_id)?null:$default_door_id))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('result', 'Result');?>
		<?php echo $this->MyForm->input('result', array('class' => 'form-control', 'value' => (empty($default_result)?null:$default_result))); ?>
</div><!-- .form-group -->

				</fieldset>
			<?php echo $this->MyForm->submit(__('Enregistrer'), array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->MyForm->end(); ?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
