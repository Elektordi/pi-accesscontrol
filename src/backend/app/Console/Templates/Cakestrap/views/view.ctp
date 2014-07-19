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
		
		<div class="<?php echo $pluralVar; ?> view content">

                    <div class="btn-toolbar pull-right">
                    <?php echo "<?php if(\$user_level>=5) { ?>"; ?>
                        <div class="btn-group">
                            <?php echo "<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-edit\"></span> '.__('Modifier " . $singularHumanName . "'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>"; ?>
                            <?php echo "<?php if(\$user_level>=7) echo \$this->Form->postLink('<span class=\"glyphicon glyphicon-remove\"></span> '.__('Supprimer " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default', 'escape' => FALSE), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>"; ?>
                        </div>
                    <?php echo "<?php } ?>"; ?>
                        <div class="btn-group">
                            <?php echo "<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-list\"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>"; ?>
                        </div>
                    </div>
                    <h2><?php echo "<?php  echo __('Fiche {$singularHumanName}').': '.\${$singularVar}['{$modelClass}']['{$displayField}']; ?>"; ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<?php
						foreach ($fields as $field) {
    						if(is_array($viewFields) && !in_array($field,$viewFields)) continue;
    						if(isset($schema[$field]['key']) && $schema[$field]['key']=='primary' && empty($schema[$field]['comment'])) continue;
							$isKey = false;
							if (!empty($associations['belongsTo'])) {
								foreach ($associations['belongsTo'] as $alias => $details) {
									if ($field === $details['foreignKey']) {
										$isKey = true;
										echo "<tr>";
										echo "\t\t<td><strong><?php echo __('" . (empty($schema[$field]['comment'])?Inflector::humanize(Inflector::underscore($alias)):addslashes($schema[$field]['comment'])) . "'); ?></strong></td>\n";
										echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => '')); ?>\n\t\t\t&nbsp;\n\t\t</td>\n";
										echo "</tr>";
										break;
									}
								}
							}
							if ($isKey !== true) {
								echo "<tr>";
								echo "\t\t<td><strong><?php echo __('" . (empty($schema[$field]['comment'])?Inflector::humanize($field):addslashes($schema[$field]['comment'])) . "'); ?></strong></td>\n";
								echo "\t\t<td>\n\t\t\t<?php echo \$this->element('value',array('page'=>'view', 'name'=>'{$field}', 'type'=>'".(isset($schema[$field])?$schema[$field]['type']:'virtual')."', 'v'=>\${$singularVar}['{$modelClass}']['{$field}'])); ?>\n\t\t\t&nbsp;\n\t\t</td>\n";
								echo "</tr>";
							}
						}
						?>
					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

                <div style="margin-top: 20px">&nbsp;</div>
                
		<?php
                /* // Commenté par GG, pas utile pour l'instant
		if (!empty($associations['hasOne'])) :
			foreach ($associations['hasOne'] as $alias => $details): ?>
				<div class="related">
					<h3><?php echo "<?php echo __('" . Inflector::humanize($details['controller']) . " lié:'); ?>"; ?></h3>
					<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
						<table class="table table-striped table-bordered">
							<?php
							foreach ($details['fields'] as $field) {
								echo "<tr>";
								echo "\t\t<td><strong><?php echo __('" . Inflector::humanize($field) . "'); ?></strong></td>\n";
								echo "\t\t<td><strong><?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</strong></td>\n";
								echo "</tr>";
							}
							?>
						</table><!-- /.table table-striped table-bordered -->
					<?php echo "<?php endif; ?>\n"; ?>
					<div class="actions">
						<?php echo "<li><?php echo \$this->Html->link(__('<i class=\"icon-pencil icon-white\"></i> Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => 'btn btn-primary', 'escape' => false)); ?>\n"; ?>
					</div><!-- /.actions -->
				</div><!-- /.related -->
			<?php
			endforeach;
		endif;
                 */

		if (empty($associations['hasMany'])) {
			$associations['hasMany'] = array();
		}
		if (empty($associations['hasAndBelongsToMany'])) {
			$associations['hasAndBelongsToMany'] = array();
		}
		$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
		$i = 0;
		foreach ($relations as $alias => $details):
			$otherSingularVar = Inflector::variable($alias);
			$otherPluralHumanName = Inflector::humanize($details['controller']);
                        $fk = $details['foreignKey'];
			?>
			
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php echo "<?php if(\$user_level>=5) echo \$this->Html->link('<span class=\"glyphicon glyphicon-plus\"></span> '.__('Créer " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add', '{$details['foreignKey']}' => \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>"; ?>
                                </div>
				<h3><?php echo "<?php echo __('" . $otherPluralHumanName . " lié(e)s:'); ?>"; ?></h3>
				
				<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<?php
										foreach ($details['schema'] as $field => $field_schema) {
                                            if($field==$fk) continue;
                                            if(is_array($details['indexFields']) && !in_array($field,$details['indexFields'])) continue;
                                            $display = (empty($field_schema['comment'])?Inflector::humanize($field):addslashes($field_schema['comment']));
                                            if(isset($field_schema['key']) && $field_schema['key']=='primary') $display="#";
											echo "\t\t<th><?php echo __('" . $display . "'); ?></th>";
										}
									?>
									<th class="actions col-md-2"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								echo "\t<?php
										\$i = 0;
										foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
										echo "\t\t<tr>\n";
											foreach ($details['schema'] as $field => $field_schema) {
											    if(is_array($details['indexFields']) && !in_array($field,$details['indexFields'])) continue;
                                                if($field==$fk) continue;
                                                echo "\t\t\t<td><?php echo \$this->element('value',array('page'=>'relation', 'name'=>'{$field}', 'type'=>'{$field_schema['type']}', 'v'=>\${$otherSingularVar}['{$field}'])); ?></td>\n";
											}

											echo "\t\t\t<td class=\"actions\">\n";
                                            echo "\t\t\t<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-file\"></span> '.__('Fiche'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>\n";
                                            echo "\t\t\t<?php if(\$user_level>=5) echo \$this->Html->link('<span class=\"glyphicon glyphicon-edit\"></span> '.__('Modifier'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>\n";
											/*echo "\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";*/
											echo "\t\t\t</td>\n";
										echo "\t\t</tr>\n";

								echo "\t<?php endforeach; ?>\n";
								?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php echo "<?php else: echo '<i>'.__('Aucune donnée.').'</i>'; endif; ?>\n\n"; ?>
				
			</div><!-- /.related -->

		<?php endforeach; ?>
	
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
