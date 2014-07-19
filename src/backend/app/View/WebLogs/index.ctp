
<div id="page-container" class="row">

	<div id="page-content">

		<div class="webLogs index">
		
		                <?php if($user_level>=5) { ?>                        <div class="btn-group pull-right">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Web Log'), array('action' => 'add'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                        </div>
                        <?php } ?>                        
			<h2><?php echo __('Web Logs'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
															<th><?php echo $this->Paginator->sort('id', '#'); ?></th>
															<th><?php echo $this->Paginator->sort('timestamp', 'Timestamp'); ?></th>
															<th><?php echo $this->Paginator->sort('user_id', 'User Id'); ?></th>
															<th><?php echo $this->Paginator->sort('action', 'Action'); ?></th>
															<th><?php echo $this->Paginator->sort('object', 'Object'); ?></th>
															<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($webLogs as $webLog): ?>
	<tr>
		<td><?php echo $this->element('value',array('page'=>'index', 'name'=>'id', 'type'=>'integer', 'v'=>$webLog['WebLog']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->element('value',array('page'=>'index', 'name'=>'timestamp', 'type'=>'datetime', 'v'=>$webLog['WebLog']['timestamp'])); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($webLog['User']['name'], array('controller' => 'users', 'action' => 'view', $webLog['User']['id'])); ?>
		</td>
		<td><?php echo $this->element('value',array('page'=>'index', 'name'=>'action', 'type'=>'string', 'v'=>$webLog['WebLog']['action'])); ?>&nbsp;</td>
		<td><?php echo $this->element('value',array('page'=>'index', 'name'=>'object', 'type'=>'string', 'v'=>$webLog['WebLog']['object'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('action' => 'view', $webLog['WebLog']['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php if($user_level>=5) echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('action' => 'edit', $webLog['WebLog']['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} sur {:pages}, avec {:current} lignes affichés sur un total de {:count}, de la ligne {:start} à la ligne {:end}')
				));
				?>			</small></p>

			<ul class="pagination">
				<?php
		echo $this->Paginator->prev('< ' . __('Page précédente'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
		echo $this->Paginator->next(__('Page suivante') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
