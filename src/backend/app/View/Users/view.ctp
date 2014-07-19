
<div id="page-container" class="row">
	
	<div id="page-content">
		
		<div class="users view content">

                    <div class="btn-toolbar pull-right">
                    <?php if($user_level>=5) { ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier User'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                            <?php if($user_level>=7) echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> '.__('Supprimer User'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-default', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>                        </div>
                    <?php } ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                        </div>
                    </div>
                    <h2><?php  echo __('Fiche User').': '.$user['User']['name']; ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Username'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'username', 'type'=>'string', 'v'=>$user['User']['username'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'name', 'type'=>'string', 'v'=>$user['User']['name'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'email', 'type'=>'string', 'v'=>$user['User']['email'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Password'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'password', 'type'=>'string', 'v'=>$user['User']['password'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Group'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Admin'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'admin', 'type'=>'boolean', 'v'=>$user['User']['admin'])); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

                <div style="margin-top: 20px">&nbsp;</div>
                
					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Card'), array('controller' => 'cards', 'action' => 'add', 'user_id' => $user['User']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Cards lié(e)s:'); ?></h3>
				
				<?php if (!empty($user['Card'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('#'); ?></th>		<th><?php echo __('Uid'); ?></th>		<th><?php echo __('Blocked'); ?></th>		<th><?php echo __('Ref'); ?></th>									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($user['Card'] as $card): ?>
		<tr>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'id', 'type'=>'integer', 'v'=>$card['id'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'uid', 'type'=>'integer', 'v'=>$card['uid'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'blocked', 'type'=>'boolean', 'v'=>$card['blocked'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'ref', 'type'=>'string', 'v'=>$card['ref'])); ?></td>
			<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('controller' => 'cards', 'action' => 'view', $card['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('controller' => 'cards', 'action' => 'edit', $card['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
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
                                    <?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Web Log'), array('controller' => 'web_logs', 'action' => 'add', 'user_id' => $user['User']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Web Logs lié(e)s:'); ?></h3>
				
				<?php if (!empty($user['WebLog'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('#'); ?></th>		<th><?php echo __('Timestamp'); ?></th>		<th><?php echo __('Action'); ?></th>		<th><?php echo __('Object'); ?></th>									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($user['WebLog'] as $webLog): ?>
		<tr>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'id', 'type'=>'integer', 'v'=>$webLog['id'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'timestamp', 'type'=>'datetime', 'v'=>$webLog['timestamp'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'action', 'type'=>'string', 'v'=>$webLog['action'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'object', 'type'=>'string', 'v'=>$webLog['object'])); ?></td>
			<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('controller' => 'web_logs', 'action' => 'view', $webLog['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('controller' => 'web_logs', 'action' => 'edit', $webLog['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
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
