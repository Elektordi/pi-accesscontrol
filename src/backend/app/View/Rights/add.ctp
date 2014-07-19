
<div id="page-container" class="row">
	
	<div id="page-content">
		<div class="rights form">
                    
                    		
			<?php echo $this->MyForm->create('Right', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
				<fieldset>

                                    <div class="btn-toolbar pull-right">
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                    </div>
                    
                                                                        <h2><?php  echo __('Ajouter Right'); ?></h2>
                                    			<div class="form-group">
	<?php echo $this->MyForm->label('group_id', 'Group Id');?>
		<?php echo $this->MyForm->input('group_id', array('class' => 'form-control', 'value' => (empty($default_group_id)?null:$default_group_id))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('door_id', 'Door Id');?>
		<?php echo $this->MyForm->input('door_id', array('class' => 'form-control', 'value' => (empty($default_door_id)?null:$default_door_id))); ?>
</div><!-- .form-group -->

				</fieldset>
			<?php echo $this->MyForm->submit(__('Enregistrer'), array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->MyForm->end(); ?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
