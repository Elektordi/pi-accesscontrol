<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Menu principal</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link('PI-AC', '/', array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li><?php echo $this->Html->Link('Accueil', '/'); ?></li>
			<li><?php echo $this->Html->Link('Cartes', array('controller'=>'cards', 'action'=>'index')); ?></li>
			<li><?php echo $this->Html->Link('Portes', array('controller'=>'doors', 'action'=>'index')); ?></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion utilisateurs <b class="caret"></b></a>
				<ul class="dropdown-menu">
				    <li><?php echo $this->Html->Link('Utilisateurs', array('controller'=>'users', 'action'=>'index')); ?></li>
				    <li><?php echo $this->Html->Link('Groupes', array('controller'=>'groups', 'action'=>'index')); ?></li>
				    <li><?php echo $this->Html->Link('Droits', array('controller'=>'rights', 'action'=>'index')); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->Link('Logs d\'accès', array('controller'=>'logs', 'action'=>'index')); ?></li>
					<li><?php echo $this->Html->Link('Logs web', array('controller'=>'web_logs', 'action'=>'index')); ?></li>
                    <?php if($user_level>=9) { ?>
    					<li><?php echo $this->Html->Link('Comptes utilisateurs', '/users'); ?></li>
                    <?php } ?>
					<li class="divider"></li>
					<li><?php echo $this->Html->Link('A propos de...', '/pages/about'); ?></li>
				</ul>
			</li>
		</ul><!-- /.nav navbar-nav -->
		
        <form class="navbar-form navbar-left visible-md visible-lg" role="search" method="post" action="<?php echo $this->Html->url("/search"); ?>">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Rechercher..." name="query" size="15" value="<?php if(!empty($query)) echo h($query); ?>">
            <span class="input-group-btn"><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button></span>
          </div>
          
        </form>
        
        <ul class="nav navbar-nav navbar-right">
        	<li><?php echo $this->Html->Link('<span class="glyphicon glyphicon-user"></span> '.$session->read('Auth.User.name'), '/users/profile', array('escape'=>FALSE)); ?></li>
	        <li><?php echo $this->Html->Link('<span class="glyphicon glyphicon-off"></span> Déconnexion', '/users/logout', array('escape'=>FALSE)); ?></li>
        </ul>
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->
