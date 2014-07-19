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
		<div class="<?php echo $pluralVar; ?> form">
                    
                    		
			<?php echo "<?php echo \$this->MyForm->create('{$modelClass}', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>\n"; ?>
				<fieldset>

                                    <div class="btn-toolbar pull-right">
                                        <?php if (strpos($action, 'add') === false) { ?>
                                        <div class="btn-group">
                                            <?php echo "<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-file\"></span> '.__('Retour fiche " . $singularHumanName . "'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>"; ?>
                                        </div>
                                        <?php } ?>
                                        <div class="btn-group">
                                            <?php echo "<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-list\"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>"; ?>
                                        </div>
                                    </div>
                    
                                    <?php if (strpos($action, 'add') === false) { ?>
                                    <h2><?php echo "<?php  echo __('Modifier {$singularHumanName}').': '.\${$singularVar}['{$modelClass}']['{$displayField}']; ?>"; ?></h2>
                                    <?php } else { ?>
                                    <h2><?php echo "<?php  echo __('Ajouter {$singularHumanName}'); ?>"; ?></h2>
                                    <?php } ?>
			<?php
				foreach ($fields as $field) {
				    if(is_array($formFields) && !in_array($field,$formFields)) continue;
				    if(empty($schema[$field])) continue;
					if ($field == $primaryKey) {
						continue;
					} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
						echo "<div class=\"form-group\">\n";
						echo "\t<?php echo \$this->MyForm->label('{$field}', '".(empty($schema[$field]['comment'])?Inflector::humanize($field):addslashes($schema[$field]['comment']))."');?>\n";
						echo "\t\t<?php echo \$this->MyForm->input('{$field}', array('class' => 'form-control', 'value' => (empty(\$default_$field)?null:\$default_$field))); ?>\n";
						echo "</div><!-- .form-group -->\n";
						echo "\n";
					}
				}
				if (!empty($associations['hasAndBelongsToMany'])) {
					foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
						echo "\t\t<?php echo \$this->MyForm->input('{$assocName}');?>\n";
					}
				}
			?>
				</fieldset>
			<?php
				echo "<?php echo \$this->MyForm->submit(__('Enregistrer'), array('class' => 'btn btn-large btn-primary')); ?>\n";
				echo "<?php echo \$this->MyForm->end(); ?>\n";
			?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
