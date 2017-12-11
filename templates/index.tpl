<link href="assets/css/bootstrap.css" rel="stylesheet">
<!-- Page Content -->

<div class="container "> 

    {if $is_connect == TRUE} <!-- verifie la variable $is_connect puis affichage de l'utilisateur avec son nom et prénom -->
        <div class="alert alert-info text-center" role="alert">
            Vous êtes connecté en tant que <b><u>{$nom_connect} {$prenom_connect}</u></b>   
        </div> 
    {/if}

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

    {if isset($tab_session['notification'])}
        <div class="alert text-center {$notification_result} alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {$tab_session['notification']}

        </div>
    {/if}

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


    {if !isset($get['recherche'])}  <!-- verifie si recherche different de vide-->


        {foreach from=$tab_articles item=value}  <!-- on parcours le tableau -->

            <div class="row justify-content-center">
                <div class="card col-md-8 border border-secondary">
                    <br/>
                    <img class="card-img-top" src="img/{$value['id']}.jpg" alt="{$value['titre']}">
                    <br/>
                    <h3 class="card-title ">{$value['titre']}</h3> 
                    <p class="card-text">{$value['texte']}          
                    </p>
                    <a href="#" class="btn btn-primary">Créé le : {$value['date_fr']}</a>
                    <br/>
                    {if $is_connect == TRUE} <!-- verifie la variable $is_connect puis affichage des autres boutons -->
                        <a href="article.php?action=Modifier&id_article={$value['id']}" class="btn btn-success">Modifier l'article</a>
                        <br/>
                        <a href="delete.php?action=Supprimer&id_article={$value['id']}" class="btn btn-danger">Supprimer l'article</a>
                        <br/>
                        <a href="index.php?page={$page_courante}&action=Commentaire&id_article={$value['id']}" class="btn btn-info"  name="commentaire" >Commentaire</a>
                        <br/>

                        {if ($get['action']=="Commentaire")} <!-- verifie si l'action est égale à commentaire -->
                            {foreach from=$tab_articles_commentaire item=$value}
                                <div class="card">
                                    <div class="card-body" style="background-color:rgb(240, 243, 244);">
                                        <h6 class="card-title">Ecrit par <b><u>{$value['nom']} {$value['prenom']}</u></b> le {$value['date']}</h6>
                                        <br>
                                        <p class="card-text"><font color="blue">{$value['txt']}</font></p>  
                                    </div>

                                </div>
                                <br>

                            {/foreach} 

                            <form action="index.php?action=ajouter_commentaire&id={$value['id']}" method="POST" enctype="multipart/form-data" >
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
                                {else}
                                {/if}
                            {/if}
                        </div>
                </div>
            </div>


        {/foreach}

    {else}
        {foreach from=$tab_articles_recherche item=value} <!-- on parcours le tableau -->

            <div class="row justify-content-center">
                <div class="card col-md-8 border border-secondary">
                    <br/>
                    <img class="card-img-top" src="img/{$value['id']}.jpg" alt="{$value['titre']}">
                    <br/>
                    <h3 class="card-title ">{$value['titre']}</h3> 
                    <p class="card-text">{$value['texte']}          
                    </p>
                    <a href="#" class="btn btn-primary">Créé le : {$value['date_fr']}</a>
                    <br/>
                    {if $is_connect == TRUE}  <!-- verifie la variable $is_connect puis affichage des autres boutons -->
                        <a href="article.php?action=modifier&id_article={$value['id']}" class="btn btn-success">Modifier l'article</a>
                        <br/>
                        <a href="delete.php?action=Supprimer&id_article={$value['id']}" class="btn btn-danger">Supprimer l'article</a>
                        <br/>
                        <a href="index.php?page={$page_courante}&action=Commentaire&id_article={$value['id']}&recherche={$get['recherche']}" class="btn btn-info" name="commentaire">Commentaire</a>
                        <br/>

                        {if ($get['action']=="Commentaire")} <!-- verifie si l'action est égale à commentaire -->
                            {foreach from=$tab_articles_commentaire item=$value}
                                <div class="card " >
                                    <div class="card-body">
                                        <h6 class="card-title">Ecrit par <b><u>{$value['nom']} {$value['prenom']}</u></b> le {$value['date']}</h6>
                                        <br>
                                        <p class="card-text">{$value['txt']}</p>
                                    </div>
                                </div>

                            {/foreach} 

                            <form action="index.php?action=ajouter_commentaire&id={$value['id']}" method="POST" enctype="multipart/form-data" >
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
                        {else}
                        {/if}
                    {/if}
                    <br/>

                </div>       
            </div>       


        {/foreach}
    {/if}
    <br/><br>
    <div class="row justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination ">

                {for $i=1 to $nb_pages} <!-- pagination -->
                    <li class="page-item {if $page_courante == $i}active{/if}">
                        <a class="page-link" href="?page={$i}">{$i}</a>
                    </li>
                {/for}

            </ul>
        </nav>
    </div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

