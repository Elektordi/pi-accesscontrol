
<div id="page-container" class="row">
	
	<div id="page-content">
		
		<div class="logs view content">

                    <div class="btn-toolbar pull-right">
                    <?php if($user_level>=5) { ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier Log'), array('action' => 'edit', $log['Log']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                            <?php if($user_level>=7) echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> '.__('Supprimer Log'), array('action' => 'delete', $log['Log']['id']), array('class' => 'btn btn-default', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $log['Log']['id'])); ?>                        </div>
                    <?php } ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                        </div>
                    </div>
                    <h2><?php  echo __('Fiche Log').': '.$log['Log']['id']; ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Timestamp'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'timestamp', 'type'=>'datetime', 'v'=>$log['Log']['timestamp'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Action'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'action', 'type'=>'string', 'v'=>$log['Log']['action'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Card'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($log['Card']['id'], array('controller' => 'cards', 'action' => 'view', $log['Card']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Door'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($log['Door']['name'], array('controller' => 'doors', 'action' => 'view', $log['Door']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Result'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'result', 'type'=>'string', 'v'=>$log['Log']['result'])); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

                <div style="margin-top: 20px">&nbsp;</div>
                
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
