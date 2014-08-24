
<div id="page-container" class="row">
	
	<div id="page-content">
		<div class="doors form">
                    
                    		
			<?php echo $this->MyForm->create('Door', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
				<fieldset>

                                    <div class="btn-toolbar pull-right">
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Retour fiche Door'), array('action' => 'view', $door['Door']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                    </div>
                    
                                                                        <h2><?php  echo __('Modifier Door').': '.$door['Door']['name']; ?></h2>
                                    			<div class="form-group">
	<?php echo $this->MyForm->label('name', 'Name');?>
		<?php echo $this->MyForm->input('name', array('class' => 'form-control', 'value' => (empty($default_name)?null:$default_name))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('ip', 'Ip');?>
		<?php echo $this->MyForm->input('ip', array('class' => 'form-control', 'value' => (empty($default_ip)?null:$default_ip))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('version', 'Version');?>
		<?php echo $this->MyForm->input('version', array('class' => 'form-control', 'value' => (empty($default_version)?null:$default_version))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('lastseen', 'Lastseen');?>
		<?php echo $this->MyForm->input('lastseen', array('class' => 'form-control', 'value' => (empty($default_lastseen)?null:$default_lastseen))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('config', 'Config');?>
		<?php echo $this->MyForm->input('config', array('class' => 'form-control', 'value' => (empty($default_config)?null:$default_config))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('serial', 'Serial');?>
		<?php echo $this->MyForm->input('serial', array('class' => 'form-control', 'value' => (empty($default_serial)?null:$default_serial))); ?>
</div><!-- .form-group -->

				</fieldset>
			<?php echo $this->MyForm->submit(__('Enregistrer'), array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->MyForm->end(); ?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
