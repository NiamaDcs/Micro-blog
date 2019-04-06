{include file="tpls/haut.tpl"}

<section>
	<div class="container"> 
		<div class="row">
			<div class="col-sm-6">
		<form action="inscription.php" method="post" id="form_inscription">
			<div class="row">
				<div class="form-group">
					<label for="inputPseudo">Pseudo</label>
					<input type="text" id="inputPseudo" name="pseudo" class="form-control" placeholder="pseudo" />
				</div>
				<div class="form-group">
					<label for="inputEmail">Email</label>
					<input type="text" id="inputEmail" name="email" class="form-control" placeholder="email" />
				</div>
				<div class="form-group">
					<label for="inputPassword">Mot de passe</label>
					<input type="password" id="inputPassword" name="mdp" class="form-control" placeholder="" />
				</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Soumettre</button>
			</div>
		</div>
		</form>
	</div>
</div>
	</div>
</section>

{include file="tpls/bas.tpl"}