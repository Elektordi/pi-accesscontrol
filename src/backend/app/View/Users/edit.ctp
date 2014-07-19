
<div id="page-container" class="row">
	
	<div id="page-content">
		<div class="users form">
                    
                    		
			<?php echo $this->MyForm->create('User', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
				<fieldset>

                                    <div class="btn-toolbar pull-right">
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Retour fiche User'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                    </div>
                    
                                                                        <h2><?php  echo __('Modifier User').': '.$user['User']['name']; ?></h2>
                                    			<div class="form-group">
	<?php echo $this->MyForm->label('username', 'Username');?>
		<?php echo $this->MyForm->input('username', array('class' => 'form-control', 'value' => (empty($default_username)?null:$default_username))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('name', 'Name');?>
		<?php echo $this->MyForm->input('name', array('class' => 'form-control', 'value' => (empty($default_name)?null:$default_name))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('email', 'Email');?>
		<?php echo $this->MyForm->input('email', array('class' => 'form-control', 'value' => (empty($default_email)?null:$default_email))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('password', 'Password');?>
		<?php echo $this->MyForm->input('password', array('class' => 'form-control', 'value' => (empty($default_password)?null:$default_password))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('group_id', 'Group Id');?>
		<?php echo $this->MyForm->input('group_id', array('class' => 'form-control', 'value' => (empty($default_group_id)?null:$default_group_id))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('admin', 'Admin');?>
		<?php echo $this->MyForm->input('admin', array('class' => 'form-control', 'value' => (empty($default_admin)?null:$default_admin))); ?>
</div><!-- .form-group -->

				</fieldset>
			<?php echo $this->MyForm->submit(__('Enregistrer'), array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->MyForm->end(); ?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
