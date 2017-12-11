<?php
session_start();

require_once 'config/init.conf.php'; // inclusion des message d'erreur
require_once 'config/bdd.conf.php'; // inclusion de la base de donnée
require_once 'config/connexion.conf.php'; // configuration de la connexion


include 'include/header.inc.php';  // inclusion du haut de page



if (isset($_POST['submit'])) { // on verifie si on appuye sur le bouton submit
    // print_r($_POST);
    print_r($_FILES);



    if ($_FILES['image']['error'] == 0) { // on teste si il y a une image
        $notification = 'Aucune notification affichée';
        $_SESSION['notification_result'] = FALSE;
        $date_du_jour = date("Y-m-d"); // format date du jour



        if (!empty($_POST['titre']) AND ! empty($_POST['texte'])) { // si titre et texte existent 
            //  if(isset($_POST['publie'])){        // si publie existe
            //       $publie = $_POST['publie']; 
            //   } else{
            //      $publie = 0;
            //  } equivalent a la ligne en dessous
            $publie = isset($_POST['publie']) ? $_POST['publie'] : 0; // si publie existe

            if ($_POST['submit'] == 'Ajouter') { //  on ajoute un article
                $insert = "INSERT INTO articles (titre, texte, date, publie)" // requete d'insertion d'article
                        . "VALUES (:titre, :texte, :date, :publie)";

                // @var $bdd PDO //
                $sth = $bdd->prepare($insert); // preparer la requete
                $sth->bindValue(':date', $date_du_jour, PDO::PARAM_STR); // sécuriser la variable
            } elseif ($_POST['submit'] == 'Modifier') { // sinon on modifie l'article 
                $update = "UPDATE articles "   // requete de mise a jour des articles
                        . "SET titre = :titre, "
                        . "texte = :texte, "
                        . "publie = :publie "
                        . "WHERE id = :id_article";

                // @var $bdd PDO //
                $sth = $bdd->prepare($update); // preparer la requete
                $sth->bindValue(':id_article', $_POST['id_article'], PDO::PARAM_INT);  // sécuriser la variable
            }


            $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR); // sécuriser la variable
            $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR); // sécuriser la variable
            $sth->bindValue(':publie', $publie, PDO::PARAM_BOOL); // sécuriser la variable


            if ($sth->execute() == TRUE) { // si la requete fonctionne on execute
                $id_article = !isset($_POST['id_article']) ? $_POST['id_article'] : $bdd->lastInsertId(); 
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION); // extension des images
                /*
                  $tab_extension = array(
                  'jpg',
                  'png',
                  'jpeg'
                  );

                  $result_extension_image = in_array($extension, $tab_extension);

                 */

                move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $id_article . '.' . $extension);  // chargement des images

                $notification = '<strong>Félicitation</strong>, votre article est inséré ou modifié.'; // notification de réussite
                $_SESSION['notification_result'] = TRUE;
            } else {
                $notification = ' Une erreur est survenue lors de l\'insertion de l\'article dans la base de données.'; // notification d'erreur
                $_SESSION['notification_result'] = FALSE;
            }
        } else {
            $notification = 'Veuillez renseigner les champs obligatoires.'; // notification pour renseigner les champs vides
            $_SESSION['notification_result'] = FALSE;
        }
    } else {
        $notification = 'Une erreur est survenue lors du traitement de votre image. '; // notification erreur d'image
        $_SESSION['notification_result'] = FALSE;
    }

    $_SESSION['notification'] = $notification;

    header('Location: index.php'); // redirection vers l'index
    exit();
} else {
    if (!empty($_GET['id_article'])) { //si Get['id_article'] different de vide
        $select = "SELECT * "  // requete de selection
                . "FROM articles "
                . "WHERE id = :id_article";

        $sth = $bdd->prepare($select); // prepare la requete
        $sth->bindValue(':id_article', $_GET['id_article'], PDO::PARAM_INT); // sécuriser la variable
    }
    if ($sth->execute() == TRUE) { // si on execute la requete
        $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC); // on stocke les variables dans un tableau
    } else { // sinon on affiche une erreur
        echo "Une erreur est survenue.. ";
    }


    include 'include/footer.inc.php'; // inclusion du bas de page
    ?>

    <!-- Page Content -->
    <div class="container col-md-4">
    <?php
    // message de notification
    if ($is_connect == TRUE) { // verifie la variable $is_connect = vrai
        ?>
            <div class="alert alert-info text-center" role="alert">
                Vous êtes connecté en tant que <b><u><?= $nom_connect ?> <?= $prenom_connect ?></u></b> 
            </div>
        <?php
    }
    ?>

        <div class="row">

            <div class="col-lg-12 text-center">
                <h1 class="mt-5"value="<?= $_GET['action'] ?>"><?= $_GET['action'] ?> un article</h1>
            </div>

        </div>
    <?php if ($_GET['action'] == "Modifier") {  // si l'action est égale à modifier
        ?> 
            <div class="alert alert-danger">
                <a  class="close" data-dismiss="alert">
                    x
                </a>
                Attention, si vous modifiez l'article, n'oubliez pas de sélectionner l'image !
        <?= $_SESSION['notification']; ?>

            </div>
            <?php
            }
            if (isset($_SESSION['notification'])) {  //affichage des notification avec couleur
                $notification_result = $_SESSION['notification_result'] == TRUE ? 'alert-success' : 'alert-danger';
                ?>

            <div class="alert text-center <?= $notification_result; ?> alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        <?= $_SESSION['notification']; ?>

            </div>
        <?php
        unset($_SESSION['notification']);
        unset($_SESSION['notification_result']);
    }
    ?>
        <br/>
        <br/>
    <?php
    foreach ($tab_articles as $value) {  // on parcours le tableau 
        ?>
            <form action="article.php" method="post" enctype="multipart/form-data" id="form_article">
                <input type="hidden" name="id_article" value="<?= $value['id'] ?>" >
                <div class="form-group ">
                    <label for="titre" class="col-form-label">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" value="<?= $value['titre'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="texte" class="col-form-label">Texte</label>
                    <textarea type="text" class="form-control" id="texte" name="texte"  required><?= $value['texte'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image"></label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
        <?php if ($_GET['action'] == "Modifier") { // si l'acton est égale à modifier
            ?> 
                        <img class="img-rounded" width="100" height="100" src="img/<?= $value['id'] ?>.jpg" >
                    <?php } ?>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <label for="publie" class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="publie" name="publie" value="1" <?php if ($value['publie'] == 1) { ?> checked <?php } ?> > Publié 
                        </label>
                    </div>
                </div>
        <?php
    }
    ?>
            <button type="submit" class="btn btn-primary" name="submit" value="<?= $_GET['action'] ?>"><?= $_GET['action'] ?> un article</button>

        </form>


    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <?php
}

