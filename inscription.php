<?php
session_start();

require_once 'config/init.conf.php'; // inclusion des message d'erreur
require_once 'config/bdd.conf.php'; // inclusion de la base de donnée

require_once 'include/fonction.inc.php'; // inclusion des fonctions
require_once 'config/connexion.conf.php'; // configuration de la connexion
require_once('libs/Smarty.class.php'); // class smarty

if(isset($_COOKIE["sid"])) // si le cookie existe
{
//vérifie si on appuye sur le bouton submit
if (isset($_POST['submit'])) {
    print_r($_POST);

    //fonction qui vérifie si les champs sont vides ou non
    if (!empty($_POST['nom']) AND ! empty($_POST['prenom']) AND ! empty($_POST['email']) AND ! empty($_POST['mdp'])) {


        $insert = "INSERT INTO utilisateurs (nom, prenom, email, mdp)" // requete d'insertion
                . "VALUES (:nom, :prenom, :email, :mdp)";

        $mdp_sec = cryptPassword($_POST['mdp']); // cryptage du mot de passe


        /* @var $bdd PDO */
        $sth = $bdd->prepare($insert);
        $sth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR); // sécurisation des variables
        $sth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);  // sécurisation des variables
        $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);  // sécurisation des variables
        $sth->bindValue(':mdp', $mdp_sec, PDO::PARAM_STR);  // sécurisation des variables

        // si l'inscription fonctionne, mettre une notification " inscription réussi"
        if ($sth->execute() == TRUE) {

            $notification = '<strong>Félicitation</strong>, votre inscription est réussie.';
            $_SESSION['notification_result'] = TRUE;
        } else { // sinon mettre une notification d'erreur
            $notification = ' Une erreur est survenue lors de votre inscription.';
            $_SESSION['notification_result'] = FALSE;
        }
    } else { // sinon on envoie une notification pour remplir les champs oubliés
        $notification = 'Veuillez renseigner les champs obligatoires.';
        $_SESSION['notification_result'] = FALSE;
    }

    $_SESSION['notification'] = $notification;

    header('Location: inscription.php'); // redirection vers la page inscription.php
    exit();
} else {

$smarty = new Smarty();  // création d'objet de classe smarty

$smarty->setTemplateDir('templates/'); // lieu des fichiers tpl
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

$smarty->assign('is_connect',$is_connect);  // déclaration de la varibale
$smarty->assign('nom_connect',$nom_connect);  // déclaration de la varibale
$smarty->assign('prenom_connect',$prenom_connect);  // déclaration de la varibale
$smarty->assign('tab_session',$_SESSION);  // déclaration de la varibale

// message de notification
 if (isset($_SESSION['notification'])) { // verifie la session notification
        $notification_result = $_SESSION['notification_result'] == TRUE ? 'alert-success' : 'alert-danger'; // on verifie si il y a une erreur
        
        $smarty->assign('notification_result',$notification_result);
        
        unset($_SESSION['notification']); // on tue la notification
        unset($_SESSION['notification_result']); // on tue le resultat de la notification
    }
}
} 

include 'include/header.inc.php'; // inclusion du haut de page 
$smarty->display('inscription.tpl'); // mise en lien de la page inscription.php avec la page inscription.tpl
include 'include/footer.inc.php'; // inclusion du bas de page
?>
