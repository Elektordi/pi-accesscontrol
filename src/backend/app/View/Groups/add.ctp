
<div id="page-container" class="row">
	
	<div id="page-content">
		<div class="groups form">
                    
                    		
			<?php echo $this->MyForm->create('Group', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
				<fieldset>

                                    <div class="btn-toolbar pull-right">
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                    </div>
                    
                                                                        <h2><?php  echo __('Ajouter Group'); ?></h2>
                                    			<div class="form-group">
	<?php echo $this->MyForm->label('name', 'Name');?>
		<?php echo $this->MyForm->input('name', array('class' => 'form-control', 'value' => (empty($default_name)?null:$default_name))); ?>
</div><!-- .form-group -->

				</fieldset>
			<?php echo $this->MyForm->submit(__('Enregistrer'), array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->MyForm->end(); ?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
