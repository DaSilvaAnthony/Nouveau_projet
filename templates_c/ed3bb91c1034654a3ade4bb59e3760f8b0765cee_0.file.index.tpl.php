<?php
/* Smarty version 3.1.30, created on 2017-11-06 14:11:32
  from "H:\UwAmp\www\startbootstrap-bare-gh-pages\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a006d949be210_90682109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed3bb91c1034654a3ade4bb59e3760f8b0765cee' => 
    array (
      0 => 'H:\\UwAmp\\www\\startbootstrap-bare-gh-pages\\templates\\index.tpl',
      1 => 1509977481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a006d949be210_90682109 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Page Content -->
<div class="container"> 

        <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == TRUE) {?> <!-- verifie la variable $is_connect puis affichage de l'utilisateur avec son nom et prénom -->
        <div class="alert alert-info text-center" role="alert">
            Vous êtes connecté en tant que  <?php echo $_smarty_tpl->tpl_vars['nom_connect']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['prenom_connect']->value;?>
   
        </div> 
        <?php }?>
    <br>
    <div class="row justify-content-center">
            <form class="form-inline my-2 my-lg-0 " method="GET" action="index.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="recherche">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            </form>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Bienvenue sur mon blog</h1>
        </div>
    </div>
    <br>

        <?php if (isset($_smarty_tpl->tpl_vars['tab_session']->value['notification'])) {?>
        <div class="alert text-center <?php echo $_smarty_tpl->tpl_vars['notification_result']->value;?>
 alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $_smarty_tpl->tpl_vars['tab_session']->value['notification'];?>


        </div>
        <?php }?>

    <br>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active ">
                <img class="d-block w-100" src="image.jpg" alt="First slide">
            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="image2.jpg" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> 
    <br/>
    <br/>

    
    <?php if (!isset($_smarty_tpl->tpl_vars['get']->value['recherche'])) {?> 


        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
            
            <div class="row justify-content-center">
                <div class="card col-md-8 border border-secondary">
                    <br/>
                    <img class="card-img-top" src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
">
                    <br/>
                    <h3 class="card-title "><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h3> 
                    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
          
                    </p>
                    <a href="#" class="btn btn-primary">Créé le : <?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</a>
                    <br/>
                    <a href="article.php?action=Modifier&id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-success">Modifier l'article</a>
                    <br/>
                </div>
            </div>
            <br/>
            
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

         
    <?php } else { ?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles_recherche']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
           
            <div class="row justify-content-center">
                <div class="card col-md-8 border border-secondary">
                    <br/>
                    <img class="card-img-top" src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
">
                    <br/>
                    <h3 class="card-title "><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h3> 
                    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
          
                    </p>
                    <a href="#" class="btn btn-primary">Créé le : <?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</a>
                    <br/>
                    <a href="article.php?action=modifier&id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-success">Modifier l'article</a>
                    <br/>
                </div>
            </div>
            <br/>
         <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php }?>
  
    <div class="row justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination ">
         
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                    <li class="page-item <?php if ($_smarty_tpl->tpl_vars['page_courante']->value == $_smarty_tpl->tpl_vars['i']->value) {?>active<?php }?>">
                        <a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
                    </li>
                    <?php }
}
?>

                
            </ul>
        </nav>
    </div>
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
