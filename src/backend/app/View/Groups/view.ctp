
<div id="page-container" class="row">
	
	<div id="page-content">
		
		<div class="groups view content">

                    <div class="btn-toolbar pull-right">
                    <?php if($user_level>=5) { ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier Group'), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                            <?php if($user_level>=7) echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> '.__('Supprimer Group'), array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-default', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>                        </div>
                    <?php } ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                        </div>
                    </div>
                    <h2><?php  echo __('Fiche Group').': '.$group['Group']['name']; ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo $this->element('value',array('page'=>'view', 'name'=>'name', 'type'=>'string', 'v'=>$group['Group']['name'])); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

                <div style="margin-top: 20px">&nbsp;</div>
                
					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Right'), array('controller' => 'rights', 'action' => 'add', 'group_id' => $group['Group']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Rights lié(e)s:'); ?></h3>
				
				<?php if (!empty($group['Right'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('#'); ?></th>		<th><?php echo __('Door Id'); ?></th>									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($group['Right'] as $right): ?>
		<tr>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'id', 'type'=>'integer', 'v'=>$right['id'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'door_id', 'type'=>'integer', 'v'=>$right['door_id'])); ?></td>
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

					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer User'), array('controller' => 'users', 'action' => 'add', 'group_id' => $group['Group']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Users lié(e)s:'); ?></h3>
				
				<?php if (!empty($group['User'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('#'); ?></th>		<th><?php echo __('Username'); ?></th>		<th><?php echo __('Name'); ?></th>		<th><?php echo __('Email'); ?></th>		<th><?php echo __('Password'); ?></th>		<th><?php echo __('Admin'); ?></th>									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'id', 'type'=>'integer', 'v'=>$user['id'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'username', 'type'=>'string', 'v'=>$user['username'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'name', 'type'=>'string', 'v'=>$user['name'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'email', 'type'=>'string', 'v'=>$user['email'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'password', 'type'=>'string', 'v'=>$user['password'])); ?></td>
			<td><?php echo $this->element('value',array('page'=>'relation', 'name'=>'admin', 'type'=>'boolean', 'v'=>$user['admin'])); ?></td>
			<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
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
