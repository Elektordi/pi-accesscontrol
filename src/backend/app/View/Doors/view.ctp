
<div id="page-container" class="row">
	
	<div id="page-content">
		
		<div class="doors view content">

                    <div class="btn-toolbar pull-right">
                    <?php if($user_level>=5) { ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier Door'), array('action' => 'edit', $door['Door']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                            <?php if($user_level>=7) echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> '.__('Supprimer Door'), array('action' => 'delete', $door['Door']['id']), array('class' => 'btn btn-default', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $door['Door']['id'])); ?>                        </div>
                    <?php } ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                        </div>
                    </div>
                    <h2><?php  echo __('Fiche Door').': '.$door['Door']['name']; ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'name', 'type'=>'string', 'v'=>$door['Door']['name'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ip'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'ip', 'type'=>'string', 'v'=>$door['Door']['ip'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Version'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'version', 'type'=>'string', 'v'=>$door['Door']['version'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Lastseen'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'lastseen', 'type'=>'datetime', 'v'=>$door['Door']['lastseen'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Config'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'config', 'type'=>'text', 'v'=>$door['Door']['config'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Serial'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'serial', 'type'=>'string', 'v'=>$door['Door']['serial'])); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

                <div style="margin-top: 20px">&nbsp;</div>
                
					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Log'), array('controller' => 'logs', 'action' => 'add', 'door_id' => $door['Door']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Logs lié(e)s:'); ?></h3>
				
				<?php if (!empty($door['Log'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('#'); ?></th>		<th><?php echo __('Timestamp'); ?></th>		<th><?php echo __('Action'); ?></th>		<th><?php echo __('Card Id'); ?></th>		<th><?php echo __('Result'); ?></th>		<th><?php echo __('Data'); ?></th>									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($door['Log'] as $log): ?>
		<tr>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'id', 'type'=>'integer', 'v'=>$log['id'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'timestamp', 'type'=>'datetime', 'v'=>$log['timestamp'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'action', 'type'=>'string', 'v'=>$log['action'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'card_id', 'type'=>'integer', 'v'=>$log['card_id'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'result', 'type'=>'string', 'v'=>$log['result'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'data', 'type'=>'string', 'v'=>$log['data'])); ?></td>
			<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('controller' => 'logs', 'action' => 'view', $log['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('controller' => 'logs', 'action' => 'edit', $log['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php else: echo '<i>'.__('Aucune donnée.').'</i>'; endif; ?>

				
			</div><!-- /.related -->

					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Right'), array('controller' => 'rights', 'action' => 'add', 'door_id' => $door['Door']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Rights lié(e)s:'); ?></h3>
				
				<?php if (!empty($door['Right'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('#'); ?></th>		<th><?php echo __('Group Id'); ?></th>									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($door['Right'] as $right): ?>
		<tr>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'id', 'type'=>'integer', 'v'=>$right['id'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'group_id', 'type'=>'integer', 'v'=>$right['group_id'])); ?></td>
			<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('controller' => 'rights', 'action' => 'view', $right['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('controller' => 'rights', 'action' => 'edit', $right['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php else: echo '<i>'.__('Aucune donnée.').'</i>'; endif; ?>

				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
