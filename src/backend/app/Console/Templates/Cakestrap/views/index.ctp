<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div id="page-container" class="row">

	<div id="page-content">

		<div class="<?php echo $pluralVar; ?> index">
		
		                <?php echo "<?php if(\$user_level>=5) { ?>"; ?>
                        <div class="btn-group pull-right">
                                <?php echo "<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-plus\"></span> '.__('Créer " . $singularHumanName . "'), array('action' => 'add'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>"; ?>
                        </div>
                        <?php echo "<?php } ?>"; ?>
                        
			<h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<?php  foreach ($fields as $field):
							        if(is_array($indexFields) && !in_array($field,$indexFields)) continue;
							        $display = (empty($schema[$field]['comment'])?Inflector::humanize($field):addslashes($schema[$field]['comment']));
							        if(isset($schema[$field]['key']) && $schema[$field]['key']=='primary') $display="#"; ?>
								<th><?php echo "<?php echo \$this->Paginator->sort('{$field}', '".$display."'); ?>"; ?></th>
							<?php endforeach; ?>
								<th class="actions col-md-2"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						echo "<?php
						foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
						echo "\t<tr>\n";
							foreach ($fields as $field) {
							    if(is_array($indexFields) && !in_array($field,$indexFields)) continue;
								$isKey = false;
								if (!empty($associations['belongsTo'])) {
									foreach ($associations['belongsTo'] as $alias => $details) {
										if ($field === $details['foreignKey']) {
											$isKey = true;
											echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
											break;
										}
									}
								}
								if ($isKey !== true) {
									echo "\t\t<td><?php echo \$this->element('value',array('page'=>'index', 'name'=>'{$field}', 'type'=>'".(isset($schema[$field])?$schema[$field]['type']:'virtual')."', 'v'=>\${$singularVar}['{$modelClass}']['{$field}'])); ?>&nbsp;</td>\n";
								}
							}

							echo "\t\t<td class=\"actions\">\n";
							echo "\t\t\t<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-file\"></span> '.__('Fiche'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>\n";
							echo "\t\t\t<?php if(\$user_level>=5) echo \$this->Html->link('<span class=\"glyphicon glyphicon-edit\"></span> '.__('Modifier'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>\n";
							/*echo "\t\t\t<?php echo \$this->Form->postLink(__('Effacer'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";*/
							echo "\t\t</td>\n";
						echo "\t</tr>\n";

						echo "<?php endforeach; ?>\n";
						?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php echo "<?php
				echo \$this->Paginator->counter(array(
				'format' => __('Page {:page} sur {:pages}, avec {:current} lignes affichés sur un total de {:count}, de la ligne {:start} à la ligne {:end}')
				));
				?>"; ?>
			</small></p>

			<ul class="pagination">
				<?php
					echo "<?php\n";
					echo "\t\techo \$this->Paginator->prev('< ' . __('Page précédente'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
					echo "\t\techo \$this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));\n";
					echo "\t\techo \$this->Paginator->next(__('Page suivante') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
					echo "\t?>\n";
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
