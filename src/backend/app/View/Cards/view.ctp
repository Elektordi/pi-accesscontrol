
<div id="page-container" class="row">
	
	<div id="page-content">
		
		<div class="cards view content">

                    <div class="btn-toolbar pull-right">
                    <?php if($user_level>=5) { ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier Card'), array('action' => 'edit', $card['Card']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                            <?php if($user_level>=7) echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> '.__('Supprimer Card'), array('action' => 'delete', $card['Card']['id']), array('class' => 'btn btn-default', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $card['Card']['id'])); ?>                        </div>
                    <?php } ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                        </div>
                    </div>
                    <h2><?php  echo __('Fiche Card').': '.$card['Card']['id']; ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Uid'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'uid', 'type'=>'integer', 'v'=>$card['Card']['uid'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($card['User']['name'], array('controller' => 'users', 'action' => 'view', $card['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Blocked'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'blocked', 'type'=>'boolean', 'v'=>$card['Card']['blocked'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ref'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'ref', 'type'=>'string', 'v'=>$card['Card']['ref'])); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

                <div style="margin-top: 20px">&nbsp;</div>
                
					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Log'), array('controller' => 'logs', 'action' => 'add', 'card_id' => $card['Card']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Logs lié(e)s:'); ?></h3>
				
				<?php if (!empty($card['Log'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('#'); ?></th>		<th><?php echo __('Timestamp'); ?></th>		<th><?php echo __('Action'); ?></th>		<th><?php echo __('Door Id'); ?></th>		<th><?php echo __('Result'); ?></th>		<th><?php echo __('Data'); ?></th>									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($card['Log'] as $log): ?>
		<tr>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'id', 'type'=>'integer', 'v'=>$log['id'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'timestamp', 'type'=>'datetime', 'v'=>$log['timestamp'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'action', 'type'=>'string', 'v'=>$log['action'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'door_id', 'type'=>'integer', 'v'=>$log['door_id'])); ?></td>
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

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
