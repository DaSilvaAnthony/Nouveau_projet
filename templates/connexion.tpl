<!-- Page Content -->
<div class="container col-md-4">
    <div class="row justify-content-center">
        {if $is_connect == TRUE}  <!-- verifie la variable $is_connect puis affichage de l'utilisateur avec son nom et prénom -->
            <div class="alert alert-info text-center" role="alert">
                Vous êtes connecté en tant que  {$nom_connect} {$prenom_connect}  
            </div>
        {/if}
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Connexion</h1>
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
