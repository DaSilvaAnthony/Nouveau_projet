<?php

require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
require_once 'include/fonction.inc.php';

require_once('libs/Smarty.class.php');

$prenom = 'Anthony';

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

$smarty->assign('name',$prenom);

//** un-comment the following line to show the debug console
//$smarty->debugging = true;
include 'include/header.inc.php';
$smarty->display('smarty-test.tpl');
include 'include/footer.inc.php';
?>