<?php
session_start();

require_once 'config/init.conf.php'; //inclusion du fichier init.conf.php si il n'est pas deja inscrit une fois 
require_once 'config/bdd.conf.php';  //inclusion du fichier bdd.conf.php si il n'est pas deja inscrit une fois
require_once 'config/connexion.conf.php';  //inclusion du fichier connexion.conf.php si il n'est pas deja inscrit une fois


include 'include/header.inc.php'; // inclusion du haut de page

if (isset($_COOKIE["sid"])) { // si le cookie existe
    if (isset($_POST['Supprimer'])) { // on verifie si on appuye sur le bouton submit "supprimer"
        $delete = "DELETE FROM articles "   // requete pour supprimer l'article
                . "WHERE id = :id_article";
        // @var $bdd PDO //
        $sth = $bdd->prepare($delete); // preparer la requete
        $sth->bindValue(':id_article', $_POST['id_article'], PDO::PARAM_INT);


        if ($sth->execute() == TRUE) {
            $notification = '<strong>Félicitation</strong>, votre article est supprimé.';  // notification de réussite
            $_SESSION['notification_result'] = TRUE; // permet d'afficher la notification

            
        } else {
            $notification = 'Votre manipulation n\'a pas fonctionné.'; // notification d'échec
            $_SESSION['notification_result'] = FALSE;
        }
        
         $deleteC = "DELETE FROM commentaires "   // requete pour supprimer les commentaires liés à l'article
                    . "WHERE id_articles = :id_article";
         
            // @var $bdd PDO //
            $std = $bdd->prepare($deleteC); // preparer la requete
            $std->bindValue(':id_article', $_POST['id_article'], PDO::PARAM_INT);
           
        if ($std->execute() == TRUE) { // si la requete s'execute
             
        }

        $_SESSION['notification'] = $notification;
        header('Location: index.php'); // redirection sur l'index une fois supprimer
        exit();
    }
    ?>


    <br>
    <br>

    <?php if ($_GET['action'] == "Supprimer") {  // si on appuye sur le bouton supprimer je redirige l'utilisateur sur une autre page pour demander confirmation
        ?> 
        <div class="alert alert-danger text-center">
            <a  class="close" data-dismiss="alert">
                x
            </a>
            Etes vous sûr de supprimer l'article ?
            <?= $_SESSION['notification']; ?>
            <br/>
            <br/>
            <form action="delete.php" method="post" enctype="multipart/form-data" id="form_article">
                <input type="hidden" name="id_article" value="<?= $_GET['id_article']; ?>" >
                <div class="row justify-content-center">  
                    <button type="submit" class="btn btn-primary" name="Supprimer" value="<?= $_GET['action'] ?>"><?= $_GET['action'] ?> l'article</button>
                </div>
            </form>
        </div>
    <?php } ?>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <?php
} else { // sinon on dit a l'utilisateur qu'il doit se connecter
    include 'include/footer.inc.php';
    ?>
    <div class="row">
        <div class="col-lg-12 text-center">
            <p class="mt-5">Vous devez être connecté !</p>
        </div>
    </div>
    <?php
}
?>