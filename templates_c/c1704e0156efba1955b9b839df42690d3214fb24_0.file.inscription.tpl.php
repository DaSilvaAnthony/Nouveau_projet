<?php
/* Smarty version 3.1.30, created on 2017-11-06 13:05:46
  from "H:\UwAmp\www\startbootstrap-bare-gh-pages\templates\inscription.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a005e2a7653f8_62249694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1704e0156efba1955b9b839df42690d3214fb24' => 
    array (
      0 => 'H:\\UwAmp\\www\\startbootstrap-bare-gh-pages\\templates\\inscription.tpl',
      1 => 1509973542,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a005e2a7653f8_62249694 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h1 class="mt-5">Inscription</h1>
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
        
        <form action="inscription.php" method="post" enctype="multipart/form-data" id="form_article">
            <div class="form-group  ">
                <label for="nom" class="col-form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
            </div>
            <div class="form-group ">
                <label for="prenom" class="col-form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
            </div>

            <div class="form-group ">
                <label for="email" class="col-form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
            </div>

            <div class="form-group ">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez un mot de passe" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Inscription</button>
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
