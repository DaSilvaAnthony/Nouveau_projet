<?php
/* Smarty version 3.1.30, created on 2017-10-23 16:26:08
  from "H:\UwAmp\www\startbootstrap-bare-gh-pages\templates\contact.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59ee1820df7412_42952806',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7a50bc61718fb4ed169a92be6c6ebaf12bbf562' => 
    array (
      0 => 'H:\\UwAmp\\www\\startbootstrap-bare-gh-pages\\templates\\contact.tpl',
      1 => 1508775950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ee1820df7412_42952806 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Page Content -->
<div class="container  col-md-4">
   
        <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == TRUE) {?>
            <div class="alert alert-info text-center" role="alert">
                Vous êtes connecté en tant que  <?php echo $_smarty_tpl->tpl_vars['nom_connect']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['prenom_connect']->value;?>
  
            </div>
            <?php }?>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Contact</h1>
        </div>
    </div>
    <br/>
    <br/>
    <form method="post" action="#" id="commentForm">
        <div class="row justify-content-center">
            <div class="form-group col-md-6">
                <label for="InputNom1">Nom</label>
                <input type="text" class="form-control" id="InputNom1" name="InputNom1" placeholder="Nom" required>
            </div>
            <div class="form-group col-md-6">
                <label for="InputPrenom1">Prénom</label>
                <input type="text" class="form-control" id="InputPrenom1" name="InputPrenom1" placeholder="Prénom" required>
            </div>
        </div>

        <div class="form-group">
            <label for="InputAdresse1">Adresse1</label>
            <input type="text" class="form-control" id="InputAdresse1" name="InputAdresse1" placeholder="Adresse1" required>
        </div>

        <div class="form-group">
            <label for="InputAdresse2">Adresse2</label>
            <input type="text" class="form-control" id="InputAdresse2" name="InputAdresse2" placeholder="Adresse2">
        </div>

        <div class="form-row ">
            <div class="form-group col-md-6">
                <label for="InputCodePostal1">Code Postal</label>
                <input type="number" class="form-control" id="InputCodePostal1" name="InputCodePostal1" placeholder="Code Postal">
            </div>

            <div class="form-group col-md-6">
                <label for="InputVille1">Ville</label>
                <select class="form-control" id="InputVille1" name="InputVille1" required>
                    <option>Dunkerque</option>
                    <option>Gravelines</option>
                    <option>Calais</option>
                    <option>Boulogne</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="InputDate1">Date de Naissance</label>
            <input type="text" class="form-control inputmask" id="InputDate1" name="InputDate1" placeholder="Date de Naissance" required>
        </div>

        <div class="form-group">
            <label for="InputPseudo1">Pseudo</label>
            <input type="text" class="form-control" id="InputPseudo1" name="InputPseudo1" placeholder="Pseudo" required>
        </div>

        <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input type="password" class="form-control" id="InputPassword1" name="InputPassword1" placeholder="Password" required>
        </div>

        <div class="form-group" id="hide1">
            <label for="InputCPassword1">Confirmation Password</label>
            <input type="password" class="form-control" id="InputCPassword1" name="InputCPassword1" placeholder="Confirmation Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>
<link href="Jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
<?php echo '<script'; ?>
 src="Jasny/js/jasny-bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="jquery.validate.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $(document).ready(function () {
        $('#hide1').hide();<!-- permet de masquer un champs (aller voir dans confirmation password) -->
    $('#InputPassword1').change(function () {
            if ($(this).val() != '') {
                $('#hide1').fadeIn(10000);
    } else {
                $('#hide1').fadeOut(10000);<!-- fonction pour faire apparaitre avec un certain temps -->
            }
        });

    $('.inputmask').inputmask({
            mask: '99/99/9999'
        });<!--     forcer de respec    ter le format choisit -->
    });
    <?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
>
            $(function (            ) {
            $("#InputDate1").datepicker            ();
            $("#commentForm").validate        ();
            });
    <?php echo '</script'; ?>
><?php }
}
