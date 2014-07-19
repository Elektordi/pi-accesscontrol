<div class="container">
	<h1 class="text-center"><b>RaspberryPI-AccessControl</h1>
</div>

<div class="container text-center">
	<?php echo $this->Html->image('logo.png'); ?>
</div>

<div class="container">
	<form class="form-signin" method="post">
		<h2 class="form-signin-heading text-center">Identifiez-vous:</h2>
		<input name="data[User][username]" type="text" class="form-control" placeholder="Identifiant" autofocus>
		<input name="data[User][password]" type="password" class="form-control" placeholder="Mot de passe">
		<label class="checkbox">
		  <input name="data[remember_me]" type="checkbox" value="1"> Se connecter automatiquement
		</label>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
	</form>
</div><!-- /#content .container -->


