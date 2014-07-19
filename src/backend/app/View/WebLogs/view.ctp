
<div id="page-container" class="row">
	
	<div id="page-content">
		
		<div class="webLogs view content">

                    <div class="btn-toolbar pull-right">
                    <?php if($user_level>=5) { ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier Web Log'), array('action' => 'edit', $webLog['WebLog']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                            <?php if($user_level>=7) echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> '.__('Supprimer Web Log'), array('action' => 'delete', $webLog['WebLog']['id']), array('class' => 'btn btn-default', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $webLog['WebLog']['id'])); ?>                        </div>
                    <?php } ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                        </div>
                    </div>
                    <h2><?php  echo __('Fiche Web Log').': '.$webLog['WebLog']['id']; ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Timestamp'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'timestamp', 'type'=>'datetime', 'v'=>$webLog['WebLog']['timestamp'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($webLog['User']['name'], array('controller' => 'users', 'action' => 'view', $webLog['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Action'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'action', 'type'=>'string', 'v'=>$webLog['WebLog']['action'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Object'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'object', 'type'=>'string', 'v'=>$webLog['WebLog']['object'])); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

                <div style="margin-top: 20px">&nbsp;</div>
                
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
