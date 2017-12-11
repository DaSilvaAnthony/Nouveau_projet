<?php
/* Smarty version 3.1.30, created on 2017-11-22 16:00:54
  from "C:\UwAmp\www\startbootstrap-bare-gh-pages\templates\contact.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a159f3679ddd6_55725100',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64c6c9ccfddea2cdd6d1fa4945090b243958cf88' => 
    array (
      0 => 'C:\\UwAmp\\www\\startbootstrap-bare-gh-pages\\templates\\contact.tpl',
      1 => 1511366375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a159f3679ddd6_55725100 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Page Content -->
<div class="container  col-md-4">

    <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == TRUE) {?>
        <div class="alert alert-info text-center" role="alert">
            Vous êtes connecté en tant que <b><u><?php echo $_smarty_tpl->tpl_vars['nom_connect']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['prenom_connect']->value;?>
</u></b>   
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
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
            </div>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required>
        </div>

        <div class="form-row ">
            <div class="form-group col-md-6">
                <label for="code_postal">Code Postal</label>
                <input type="number" class="form-control" id="code_postal" name="code_postal" placeholder="Code Postal" required>
            </div>

            <div class="form-group col-md-6">
                <label for="ville">Ville</label>
                <select class="form-control" id="ville" name="ville" required>
                    <option>Dunkerque</option>
                    <option>Gravelines</option>
                    <option>Calais</option>
                    <option>Boulogne</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
        </div>
        <div class="form-group ">
            <label for="commentaire" class="col-form-label">Commentaire</label>
            <textarea class="form-control" id="commentaire" placeholder="Ajoutez votre commentaire" required></textarea>
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
        $("#InputDate1").datepicker();
        $("#commentForm").validate();
    });
    <?php echo '</script'; ?>
><?php }
}
