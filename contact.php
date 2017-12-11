<?php
session_start();

require_once 'config/init.conf.php'; // inclusion des message d'erreur
require_once 'config/bdd.conf.php'; // inclusion de la base de donnée

require_once 'include/fonction.inc.php'; // inclusion des fonctions
require_once 'config/connexion.conf.php'; // configuration de la connexion
require_once('libs/Smarty.class.php'); // class smarty

$smarty = new Smarty();  // création d'objet de classe smarty

$smarty->setTemplateDir('templates/');  // lieu des fichiers tpl
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

$smarty->assign('is_connect',$is_connect); // déclaration de la variable
$smarty->assign('nom_connect',$nom_connect);  // déclaration de la variable
$smarty->assign('prenom_connect',$prenom_connect);  // déclaration de la variable

//** un-comment the following line to show the debug console
//$smarty->debugging = true;
include 'include/header.inc.php'; // inclusion du haut de page
$smarty->display('contact.tpl');  // mise en lien de la page contact.php avec la page contact.tpl
include 'include/footer.inc.php'; // inclusion du bas de page

?>



           

