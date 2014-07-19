
<div id="page-container" class="row">
	
	<div id="page-content">
		
		<div class="rights view content">

                    <div class="btn-toolbar pull-right">
                    <?php if($user_level>=5) { ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier Right'), array('action' => 'edit', $right['Right']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                            <?php if($user_level>=7) echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> '.__('Supprimer Right'), array('action' => 'delete', $right['Right']['id']), array('class' => 'btn btn-default', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $right['Right']['id'])); ?>                        </div>
                    <?php } ?>                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                        </div>
                    </div>
                    <h2><?php  echo __('Fiche Right').': '.$right['Right']['id']; ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Group'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($right['Group']['name'], array('controller' => 'groups', 'action' => 'view', $right['Group']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Door'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($right['Door']['name'], array('controller' => 'doors', 'action' => 'view', $right['Door']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

                <div style="margin-top: 20px">&nbsp;</div>
                
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
