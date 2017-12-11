<!-- Page Content -->
<div class="container  col-md-4">

    {if $is_connect == TRUE}  <!-- verifie la variable $is_connect puis affichage de l'utilisateur avec son nom et prénom -->
        <div class="alert alert-info text-center" role="alert">
            Vous êtes connecté en tant que <b><u>{$nom_connect} {$prenom_connect}</u></b>   
        </div>
    {/if}
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="Jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
<script src="Jasny/js/jasny-bootstrap.min.js"></script>
<script src="jquery.validate.min.js"></script>

<script>
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
</script>
    
<script>
    $(function (            ) {
        $("#InputDate1").datepicker();
        $("#commentForm").validate();
    });
    </script>