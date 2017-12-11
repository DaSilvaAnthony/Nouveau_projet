<!-- Page Content -->
<div class="container  col-md-4">

    {if $is_connect == TRUE}  <!-- verifie la variable $is_connect puis affichage de l'utilisateur avec son nom et prénom -->
        <div class="alert alert-info text-center" role="alert">
            Vous êtes connecté en tant que <b><u>{$nom_connect} {$prenom_connect}</u></b>   
        </div>
    {/if}
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Inscription</h1>
        </div>
        
        {if isset($tab_session['notification'])}
            <div class="alert text-center {$notification_result} alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {$tab_session['notification']}

            </div>
        {/if}
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>



