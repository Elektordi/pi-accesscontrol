
<div id="page-container" class="row">
	
	<div id="page-content">
		<div class="cards form">
                    
                    		
			<?php echo $this->MyForm->create('Card', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
				<fieldset>

                                    <div class="btn-toolbar pull-right">
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Retour fiche Card'), array('action' => 'view', $card['Card']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                    </div>
                    
                                                                        <h2><?php  echo __('Modifier Card').': '.$card['Card']['id']; ?></h2>
                                    			<div class="form-group">
	<?php echo $this->MyForm->label('uid', 'Uid');?>
		<?php echo $this->MyForm->input('uid', array('class' => 'form-control', 'value' => (empty($default_uid)?null:$default_uid))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('user_id', 'User Id');?>
		<?php echo $this->MyForm->input('user_id', array('class' => 'form-control', 'value' => (empty($default_user_id)?null:$default_user_id))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('blocked', 'Blocked');?>
		<?php echo $this->MyForm->input('blocked', array('class' => 'form-control', 'value' => (empty($default_blocked)?null:$default_blocked))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('ref', 'Ref');?>
		<?php echo $this->MyForm->input('ref', array('class' => 'form-control', 'value' => (empty($default_ref)?null:$default_ref))); ?>
</div><!-- .form-group -->

				</fieldset>
			<?php echo $this->MyForm->submit(__('Enregistrer'), array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->MyForm->end(); ?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
