<?php
/* Smarty version 3.1.30, created on 2017-12-08 11:02:29
  from "C:\UwAmp\www\startbootstrap-bare-gh-pages\templates\connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a2a714575c8c6_05537414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c132c4cb8916daa415477350f32103cb0d7ab2a6' => 
    array (
      0 => 'C:\\UwAmp\\www\\startbootstrap-bare-gh-pages\\templates\\connexion.tpl',
      1 => 1512730637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2a714575c8c6_05537414 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Page Content -->
<div class="container col-md-4">
    <div class="row justify-content-center">
        <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == TRUE) {?>
            <div class="alert alert-info text-center" role="alert">
                Vous êtes connecté en tant que  <?php echo $_smarty_tpl->tpl_vars['nom_connect']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['prenom_connect']->value;?>
  
            </div>
        <?php }?>
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Connexion</h1>
        </div>


        <?php if (isset($_smarty_tpl->tpl_vars['tab_session']->value['notification'])) {?>
            <div class="alert text-center <?php echo $_smarty_tpl->tpl_vars['notification_result']->value;?>
 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo $_smarty_tpl->tpl_vars['tab_session']->value['notification'];?>


            </div>
        <?php }?>


    </div>
    <br/>
    <br/>

    <form action="connexion.php" method="post" enctype="multipart/form-data" id="form_article">

        <div class="form-group ">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
        </div>

        <div class="form-group ">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez un mot de passe" required>
        </div>

        <button type="submit" id="submit" class="btn btn-primary" name="submit">Connexion</button>
    </form>


</div>
<!-- Bootstrap core JavaScript -->
<?php echo '<script'; ?>
 src="vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="vendor/popper/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="vendor/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php }
}
