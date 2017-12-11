<?php
session_start();

require_once 'config/init.conf.php'; // inclusion des message d'erreur
require_once 'config/bdd.conf.php'; // inclusion de la base de donnée

require_once 'include/fonction.inc.php'; // inclusion des fonctions
require_once 'config/connexion.conf.php'; // configuration de la connexion
require_once('libs/Smarty.class.php'); // class smarty

//vérifie si on appuye sur le bouton submit
if (isset($_POST['submit'])) {
    print_r($_POST);

    //fonction qui vérifie si les champs soont vides ou non
    if (! empty($_POST['email']) AND ! empty($_POST['mdp'])) {
        
        $notification= 'Aucune notification à afficher';
        $mdp_sec = cryptPassword($_POST['mdp']); // sécurité du mot de passe

        $select_user = "SELECT email, " // requete de selection sql
                . "mdp "
                . "FROM utilisateurs "
                . "WHERE email = :email "
                . "AND mdp =:mdp";


        /* @var $bdd PDO */
        $sth = $bdd->prepare($select_user);  // preparer la requete
        $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR); // sécurisation des variables
        $sth->bindValue(':mdp', $mdp_sec, PDO::PARAM_STR);    // sécurisation des variables
        
        // si l'inscription fonctionne, mettre une notification " inscription réussi"
        if ($sth->execute() == TRUE) {
            
            $count = $sth->rowCount();
            if($count > 0) { // si le nombre de ligne est supérieur à 0
                $sid =sid($_POST['email']);
                
                $update_sid = "UPDATE utilisateurs " // requete de mise a jour des utilisateurs
                        . "SET sid = :sid "
                        . "WHERE email = :email";
                
                $sth_update = $bdd->prepare($update_sid);  // preparer la requete
                $sth_update->bindValue(':sid', $sid, PDO::PARAM_STR);  // sécurisation des variables
                $sth_update->bindValue(':email', $_POST['email'], PDO::PARAM_STR);  // sécurisation des variables
                
                if($sth_update->execute() == TRUE) { // si la requete fonctionne on execute
                    
                    setcookie('sid', $sid, time() + 86400); // creation de cookie
                    
                    $notification = 'Félicitation, vous êtes connecté.'; // message de success
                    $_SESSION['notification'] = $notification;
                    $_SESSION['notification_result'] = TRUE;
                    header('Location: index.php'); // redirection vers la page index
                    exit();
                    
                } else {
                    $notification = 'Une erreur technique est survenue.'; // notification d'erreur technique
                    $_SESSION['notification_result'] = FALSE;
                }
            } else {
                $notification = 'L\'email ou le mot de passe est incorrect.'; // sinon on soumet un message d'erreur
                $_SESSION['notification_result'] = FALSE;
            }
            
        } else { // sinon mettre une notification d'erreur
            $notification = ' Une erreur est survenue lors de votre connexion.';  // notification d'erreur de connexion
            $_SESSION['notification_result'] = FALSE;
        }
    } else { // sinon on envoie une notification pour remplir les champs oubliés
        $notification = 'Veuillez renseigner les champs obligatoires.';
        $_SESSION['notification_result'] = FALSE;
    }

    $_SESSION['notification'] = $notification;
    header('Location: connexion.php'); // redirige vers la page connexion
    exit();
    
} else {
    

$smarty = new Smarty(); // création d'objet de classe smarty

$smarty->setTemplateDir('templates/');  // lieu des fichiers tpl
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

$smarty->assign('is_connect',$is_connect); // déclaration de la varibale
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
//** un-comment the following line to show the debug console
//$smarty->debugging = true;
include 'include/header.inc.php';  // inclusion du haut de page 
$smarty->display('connexion.tpl');  // mise en lien de la page connexion.php avec la page connexion.tpl
include 'include/footer.inc.php';  // inclusion du bas de page 
?>