<?php
/* Smarty version 3.1.33, created on 2019-03-30 15:06:33
  from 'C:\xampp\htdocs\Smarty\microblogSmarty\tpls\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9f77e9dad2c3_76582028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b229e3b8942af97c09f9ad0f682227a5ac4807b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Smarty\\microblogSmarty\\tpls\\index.tpl',
      1 => 1553954515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpls/haut.tpl' => 1,
    'file:tpls/bas.tpl' => 1,
  ),
),false)) {
function content_5c9f77e9dad2c3_76582028 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:tpls/haut.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- About Section -->
<section>
    <div class="container">
        <div class="row">
            <form action="message.php" method="POST" enctype="multipart/form-data">
                <div class="col-sm-6">
                    <div class="form-group">
                         <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
                        <textarea id="message" name="message" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['message']->value;?>
"></textarea>
                         <input type="text" name="user" class="form-control" style="width: 150px; margin-top: 8px" placeholder="Utilisateur">
                    </div>
                </div>

                 <div class="col-sm-4 ">
                    <label for="image">Select an image</label>
                    <input type="file" name="image" id="image" />
                 </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success btn-lg" >Envoyer</button>
                </div>       
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <div class="col-md-12">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_data']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                <blockquote>
                    <p>
                        <!--on verifie si l'image existe-->
                        <!--<?php if ($_smarty_tpl->tpl_vars['data']->value['img']) {?>
                        <img src="./data/images/<?php echo $_smarty_tpl->tpl_vars['data']->value['img'];?>
.jpg" alt="une image e-learning" width="15%" style=" float:left margin-left:15px" />
                        <?php }?>-->
                        <img src="./data/images/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
.jpg" alt="une image e-learning" width="15%" style="float:left" />
                        
                        <?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['contenu'], ENT_QUOTES, 'UTF-8', true));?>

                        
                    </p>
                    <a href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="btn btn-info"> Modifier</a>
                    <a href="suppression.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="btn btn-danger">Supprimer</a>
                    <a href="#" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="btn btn-primary buttonVote">Vote</a><small class="text-muted nbreVote"> Nombre de vote : 12<p><?php echo $_smarty_tpl->tpl_vars['data']->value['date_ajout'];?>
</p></small>
                </blockquote>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
    </div>

    <!--Pagination -->
    <div>
    <nav>
        <ul class="pagination pagination-lg">
            <li><a href="?p=<?php echo $_smarty_tpl->tpl_vars['pageAnt']->value;?>
">&laquo;</a></li>
            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nbpage']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nbpage']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                <li class="<?php echo $_smarty_tpl->tpl_vars['pageCourant']->value;?>
"><a href="?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
            <?php }
}
?>
            <li><a href="?p=<?php echo $_smarty_tpl->tpl_vars['pageSuiv']->value;?>
">&raquo;</a></li>
        </ul>
    </nav>
    </div>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:tpls/bas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 src="../js/mainIndex.js"><?php echo '</script'; ?>
>
<?php }
}
