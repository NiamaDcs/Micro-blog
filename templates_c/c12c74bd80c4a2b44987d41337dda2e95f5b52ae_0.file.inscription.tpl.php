<?php
/* Smarty version 3.1.33, created on 2019-04-10 19:34:15
  from 'C:\xampp\htdocs\Smarty\microblogSmarty\tpls\inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cae2917abbc72_81916092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c12c74bd80c4a2b44987d41337dda2e95f5b52ae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Smarty\\microblogSmarty\\tpls\\inscription.tpl',
      1 => 1553949284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpls/haut.tpl' => 1,
    'file:tpls/bas.tpl' => 1,
  ),
),false)) {
function content_5cae2917abbc72_81916092 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:tpls/haut.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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

<?php $_smarty_tpl->_subTemplateRender("file:tpls/bas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
