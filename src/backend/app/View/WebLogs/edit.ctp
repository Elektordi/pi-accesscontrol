
<div id="page-container" class="row">
	
	<div id="page-content">
		<div class="webLogs form">
                    
                    		
			<?php echo $this->MyForm->create('WebLog', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
				<fieldset>

                                    <div class="btn-toolbar pull-right">
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Retour fiche Web Log'), array('action' => 'view', $webLog['WebLog']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                    </div>
                    
                                                                        <h2><?php  echo __('Modifier Web Log').': '.$webLog['WebLog']['id']; ?></h2>
                                    			<div class="form-group">
	<?php echo $this->MyForm->label('timestamp', 'Timestamp');?>
		<?php echo $this->MyForm->input('timestamp', array('class' => 'form-control', 'value' => (empty($default_timestamp)?null:$default_timestamp))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('user_id', 'User Id');?>
		<?php echo $this->MyForm->input('user_id', array('class' => 'form-control', 'value' => (empty($default_user_id)?null:$default_user_id))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('action', 'Action');?>
		<?php echo $this->MyForm->input('action', array('class' => 'form-control', 'value' => (empty($default_action)?null:$default_action))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('object', 'Object');?>
		<?php echo $this->MyForm->input('object', array('class' => 'form-control', 'value' => (empty($default_object)?null:$default_object))); ?>
</div><!-- .form-group -->

				</fieldset>
			<?php echo $this->MyForm->submit(__('Enregistrer'), array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->MyForm->end(); ?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
