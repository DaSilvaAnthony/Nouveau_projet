<?php
/* Smarty version 3.1.30, created on 2017-12-06 09:48:53
  from "C:\UwAmp\www\startbootstrap-bare-gh-pages\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a27bd0531e724_43690587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c898cad4726d1551ac1e6e30c53dab2789f060f' => 
    array (
      0 => 'C:\\UwAmp\\www\\startbootstrap-bare-gh-pages\\templates\\index.tpl',
      1 => 1512552824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a27bd0531e724_43690587 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<!-- Page Content -->

<div class="container "> 

    <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == TRUE) {?> <!-- verifie la variable $is_connect puis affichage de l'utilisateur avec son nom et prénom -->
        <div class="alert alert-info text-center" role="alert">
            Vous êtes connecté en tant que <b><u><?php echo $_smarty_tpl->tpl_vars['nom_connect']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['prenom_connect']->value;?>
</u></b>   
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
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active ">
                <img class="d-block w-100 " src="image.png" alt="First slide">
            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="image2.png" alt="Second slide">
            </div>
            <div class="carousel-item  ">
                <img class="d-block w-100 " src="image3.png" alt="Third slide">
            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="image4.png" alt="Fourth slide">
            </div>
            <div class="carousel-item  ">
                <img class="d-block w-100 " src="image5.png" alt="Fifth slide">
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
                    <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == TRUE) {?>
                        <a href="article.php?action=Modifier&id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-success">Modifier l'article</a>
                        <br/>
                        <a href="delete.php?action=Supprimer&id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-danger">Supprimer l'article</a>
                        <br/>
                        <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page_courante']->value;?>
&action=Commentaire&id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-info"  name="commentaire" >Commentaire</a>
                        <br/>

                        <?php if (($_smarty_tpl->tpl_vars['get']->value['action'] == "Commentaire")) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles_commentaire']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                                <div class="card">
                                    <div class="card-body" style="background-color:rgb(240, 243, 244);">
                                        <h6 class="card-title">Ecrit par <b><u><?php echo $_smarty_tpl->tpl_vars['value']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['prenom'];?>
</u></b> le <?php echo $_smarty_tpl->tpl_vars['value']->value['date'];?>
</h6>
                                        <br>
                                        <p class="card-text"><font color="blue"><?php echo $_smarty_tpl->tpl_vars['value']->value['txt'];?>
</font></p>  
                                    </div>

                                </div>
                                <br>

                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 

                            <form action="index.php?action=ajouter_commentaire&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <br>
                                    <label for="nom" class="col-form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
                                    <br>

                                    <label for="prenom" class="col-form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>

                                    <br>

                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>

                                    <br>
                                    <label for="commentaire" class="col-form-label">Commentaire</label>
                                    <textarea type="text" class="form-control" id="commentaire" name="commentaire" rows="6" ></textarea>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="submit" value="ajouter_commentaire">Ajouter</button>
                                    </div>
                                    <br>
                                    </form>
                                <?php } else { ?>
                                <?php }?>
                            <?php }?>
                        </div>
                </div>
            </div>


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
                    <?php if ($_smarty_tpl->tpl_vars['is_connect']->value == TRUE) {?>
                        <a href="article.php?action=modifier&id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-success">Modifier l'article</a>
                        <br/>
                        <a href="delete.php?action=Supprimer&id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-danger">Supprimer l'article</a>
                        <br/>
                        <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page_courante']->value;?>
&action=Commentaire&id_article=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&recherche=<?php echo $_smarty_tpl->tpl_vars['get']->value['recherche'];?>
" class="btn btn-info" name="commentaire">Commentaire</a>
                        <br/>

                        <?php if (($_smarty_tpl->tpl_vars['get']->value['action'] == "Commentaire")) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles_commentaire']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                                <div class="card " >
                                    <div class="card-body">
                                        <h6 class="card-title">Ecrit par <b><u><?php echo $_smarty_tpl->tpl_vars['value']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['prenom'];?>
</u></b> le <?php echo $_smarty_tpl->tpl_vars['value']->value['date'];?>
</h6>
                                        <br>
                                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['txt'];?>
</p>
                                    </div>
                                </div>

                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 

                            <form action="index.php?action=ajouter_commentaire&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <br>
                                    <label for="nom" class="col-form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
                                    <br>

                                    <label for="prenom" class="col-form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>

                                    <br>

                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>

                                    <br>
                                    <label for="commentaire" class="col-form-label">Commentaire</label>
                                    <textarea type="text" class="form-control" id="commentaire" name="commentaire" rows="6" ></textarea>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="submit" value="ajouter_commentaire">Ajouter</button>
                                    </div>
                                    <br>
                                </div>
                            </form>
                        <?php } else { ?>
                        <?php }?>
                    <?php }?>
                    <br/>

                </div>       
            </div>       


        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php }?>
    <br/><br>
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
