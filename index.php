<?php
session_start();

require_once 'config/init.conf.php'; // inclusion des message d'erreur
require_once 'config/bdd.conf.php'; // inclusion de la base de donnée

require_once 'include/fonction.inc.php'; // inclusion des fonctions
require_once 'config/connexion.conf.php'; // configuration de la connexion
require_once('libs/Smarty.class.php'); // class smarty


$nb_articles_par_pages = 1; // definir le nombre d'article par page

$page_courante = isset($_GET['page']) ? $_GET['page'] : 1; // si get_page existe alors la valeur sera la get_page sinon elle sera la valeur 1

$index = pagination($page_courante, $nb_articles_par_pages);

$nb_total_article_publie = nb_total_article_publie($bdd); // definir le nombre d'article publie

$nb_pages = ceil($nb_total_article_publie / $nb_articles_par_pages);  // definir le nombre de page


$select = "SELECT id, "     //requete sql de selection pour recuperer les article publie
        . "titre, "
        . "texte, "
        . "DATE_FORMAT(date, '%d/%m/%Y') as date_fr "
        . "FROM articles "
        . "WHERE publie = :publie "
        . "LIMIT :index, :nb_articles_par_pages;";


/* @var $bdd PDO */
$sth = $bdd->prepare($select); // prepare la requete
$sth->bindValue(':publie', 1, PDO::PARAM_BOOL);  // sécurisation des variables
$sth->bindValue(':index', $index, PDO::PARAM_INT);  // sécurisation des variables
$sth->bindValue(':nb_articles_par_pages', $nb_articles_par_pages, PDO::PARAM_INT); // sécurisation des variables

if ($sth->execute() == TRUE) {  // si la requete s'execute
    $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC); // on stocke les valeurs dans un tableau

} else { // sinon
    echo "Une erreur est survenue.. "; // message d'erreur
}

if (isset($_GET['recherche'])) {
    $sql = "SELECT id, "    // requete de selection pour la recherche
            . "titre, "
            . "texte, "
            . "DATE_FORMAT(date, '%d/%m/%Y') as date_fr "
            . "FROM articles "
            . "WHERE (titre LIKE :recherche OR texte LIKE :recherche) "
            . "AND publie=1 "
            . "ORDER BY date DESC "
            . "LIMIT :debut, :message_par_page";

    /* @var $bdd PDO */
    $std = $bdd->prepare($sql); // prepare la requete
    $std->bindValue(':recherche', '%' . $_GET['recherche'] . '%', PDO::PARAM_STR);   // sécurisation des variables
    $std->bindValue(':publie', 1, PDO::PARAM_BOOL);   // sécurisation des variables
    $std->bindValue(':debut', $index, PDO::PARAM_INT);  // sécurisation des variables
    $std->bindValue(':message_par_page', $nb_articles_par_pages, PDO::PARAM_INT);  // sécurisation des variables



    if ($std->execute() == TRUE) { // si la requete s'execute
        $tab_articles_recherche = $std->fetchAll(PDO::FETCH_ASSOC);  // on stocke les valeurs dans un tableau
    
    } else {
        echo "Une erreur est survenue.. "; // message d'erreur
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "Commentaire") { //si l'action est éagale à commentaire
        $sql = "SELECT commentaires.commentaire as txt, commentaires.nom, commentaires.prenom, commentaires.date_commentaire as date " // requete sql de selection
            . "FROM commentaires "
            . "INNER JOIN articles ON commentaires.id_articles=articles.id "
            . "WHERE id_articles = :id";
        $std = $bdd->prepare($sql);
        $std->bindValue(':id', $_GET['id_article'], PDO::PARAM_INT);  // sécurisation des variables
        if ($std->execute() == TRUE) { // si la requete s'execute
            $tab_articles_commentaire = $std->fetchAll(PDO::FETCH_ASSOC); // on stocke dans un tableur les valeurs
            //print_r ($tab_articles_commentaire);
        } else {
            echo "Une erreur est survenue.. "; // message d'erreur
        }
    }
}


if (isset($_GET['action'])) {
    if ($_GET['action'] == "ajouter_commentaire") { // si l'action est égale à "ajouter_commentaire" alors on procede a la requete sql
        $date_du_jour = date("Y-m-d");
        
        $sql = "INSERT INTO commentaires values ('', :id_articles, :nom, :prenom, :email, :commentaire, :date_commentaire)"; // requete sql d'insertion d'un commentaire
        
        $std = $bdd->prepare($sql); // preparation de la requete
        $std->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);  // sécurisation des variables
        $std->bindValue(':email', $_POST['email'], PDO::PARAM_STR);  // sécurisation des variables
        $std->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);  // sécurisation des variables
        $std->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);  // sécurisation des variables
        $std->bindValue(':date_commentaire', $date_du_jour, PDO::PARAM_STR);  // sécurisation des variables
        $std->bindValue(':id_articles', $_GET['id'], PDO::PARAM_INT);  // sécurisation des variables
        
        if ($std->execute() == TRUE) { // si la requete s'execute
            header('Location:index.php'); // redirection vers l'index
        } else {
            echo "Une erreur est survenue.. ";  // message d'erreur
        }
    }
}
     

$smarty = new Smarty();   // création d'objet de classe smarty

$smarty->setTemplateDir('templates/');  // lieu des fichiers tpl
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

$smarty->assign('is_connect',$is_connect);  // déclaration de la varibale
$smarty->assign('nom_connect',$nom_connect);  // déclaration de la varibale
$smarty->assign('prenom_connect',$prenom_connect);   // déclaration de la varibale
$smarty->assign('tab_session',$_SESSION);  // déclaration de la varibale
$smarty->assign('tab_articles',$tab_articles);   // déclaration de la varibale
$smarty->assign('get',$_GET);  // déclaration de la varibale
$smarty->assign('tab_articles_recherche',$tab_articles_recherche);   // déclaration de la varibale
$smarty->assign('nb_pages',$nb_pages);   // déclaration de la varibale
$smarty->assign('page_courante',$page_courante);   // déclaration de la varibale
$smarty->assign('tab_commentaires',$tab_commentaires);   // déclaration de la varibale
$smarty->assign('tab_articles_commentaire', $tab_articles_commentaire);   // déclaration de la varibale

// message de notification
 if (isset($_SESSION['notification'])) { // verifie la session notification
        $notification_result = $_SESSION['notification_result'] == TRUE ? 'alert-success' : 'alert-danger'; // on verifie si il y a une erreur
        
        $smarty->assign('notification_result',$notification_result);
        
        unset($_SESSION['notification']); // on tue la notification
        unset($_SESSION['notification_result']); // on tue le resultat de la notification
    }

//** un-comment the following line to show the debug console
//$smarty->debugging = true;
include 'include/header.inc.php';   // inclusion du haut de page 
$smarty->display('index.tpl');  // mise en lien de la page index.php avec la page index.tpl
include 'include/footer.inc.php';   // inclusion du bas de page
?>








