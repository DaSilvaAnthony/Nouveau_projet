<?php
/* Smarty version 3.1.30, created on 2017-10-23 16:19:21
  from "H:\UwAmp\www\startbootstrap-bare-gh-pages\templates\connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59ee1689e39a98_59916968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d6824f4197fd1275ee84c6e6cd6546ad21b822d' => 
    array (
      0 => 'H:\\UwAmp\\www\\startbootstrap-bare-gh-pages\\templates\\connexion.tpl',
      1 => 1508775560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ee1689e39a98_59916968 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container col-md-4">
    
    <div class="row">
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
            
    
    <form action="connexion.php" method="post" enctype="multipart/form-data" id="form_article">
        
        <br>
        <br>
        
        <div class="form-group ">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
        </div>

        <div class="form-group ">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez un mot de passe" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Connexion</button>
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
><?php }
}
