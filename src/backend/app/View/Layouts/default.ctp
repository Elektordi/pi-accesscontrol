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
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'PI-AC');
?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			
			echo $this->fetch('meta');

			echo $this->Html->css('bootstrap.min');
			echo $this->Html->css('datepicker');
			echo $this->Html->css('bootstrap-select.min');
			// Uncomment this to enable the bootstrap gradient theme (Flat is way better though).
			//echo $this->Html->css('bootstrap-theme.min');
			echo $this->Html->css('core');

			echo $this->fetch('css');
			
			echo $this->Html->script('libs/jquery-1.10.2.min');
			echo $this->Html->script('libs/bootstrap.min');
			echo $this->Html->script('libs/bootstrap-datepicker');
			echo $this->Html->script('libs/bootstrap-select.min');
			
			echo $this->fetch('script');
		?>
	</head>

	<body>

		<div id="main-container">
		
			<div class="visible-print pull-right" style="margin-right: 20px;">
			    <p><i>Extrait de <?php echo $cakeDescription ?> le <?php echo date("d/m/Y"); ?>.</i></p>
			</div>
		
			<div id="header" class="container hidden-print">
				<?php echo $this->element('menu/top_menu', array('session'=>$this->Session)); ?>
				<br/><br/>
			</div><!-- /#header .container -->
			
			<div id="content" class="container">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div><!-- /#content .container -->
			
			<br/>
			
			<div id="footer" class="container hidden-print">
				<p class="text-right">
					
				</p>
			</div><!-- /#footer .container -->
			
		</div><!-- /#main-container -->
		
		<div class="container">
			<div class="well well-sm text-center">
				<small><span title="PI-AccessControl">PI-AC</span> version 0.1 - Développé par Guillaume Genty
				    <span class="hidden-print"> - Logiciel sous license <a href="" target="_blank">a définir</a> - <i><a href="https://github.com/Elektordi/pi-accesscontrol" target="_blank">Fork me on GitHub</a></i></span>
					<?php echo $this->element('sql_dump'); ?>
				</small>
			</div><!-- /.well well-sm -->
		</div><!-- /.container -->
		
	</body>

</html>
