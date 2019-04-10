<?php
/* Smarty version 3.1.33, created on 2019-04-10 19:34:14
  from 'C:\xampp\htdocs\Smarty\microblogSmarty\tpls\connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cae291626d591_13881335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51e2b3f85ef2549ed0fec0497995725ae686d83d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Smarty\\microblogSmarty\\tpls\\connexion.tpl',
      1 => 1548866480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpls/haut.tpl' => 1,
    'file:tpls/bas.tpl' => 1,
  ),
),false)) {
function content_5cae291626d591_13881335 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:tpls/haut.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section>
    <div class="container">
        <div class="row">

            <form id="form-login" action="connexion.php" method="POST" class="col-md-6 center" >

                <div class="alert alert-danger hide" id="notif">Erreur.....</div>
                <div class="form-group">
                    <label for="mail">Adresse e-mail</label>
                    <input type="text" name="email" id="mail" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" name="mdp" id="pwd" value="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="connexion" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $_smarty_tpl->_subTemplateRender("file:tpls/bas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php echo '<script'; ?>
 language="JavaScript">
        $(function () {
            $("#form-login").submit(function (event) {
                if (("#mail").val() ===""){
                   $("#notif").removeClass("hide");
                   return true
                } else {
                    $("#notif").addClass("hide");
                    return false
                }

            });
            event.preventDefault();
        });
    <?php echo '</script'; ?>
>

<?php }
}
