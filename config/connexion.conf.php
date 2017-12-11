<?php

require_once 'config/init.conf.php'; //inclusion du fichier init.conf.php si il n'est pas deja inscrit une fois 
require_once 'config/bdd.conf.php';  //inclusion du fichier bdd.conf.php si il n'est pas deja inscrit une fois 

$is_connect = FALSE;

if (isset($_COOKIE['sid']) AND ! empty($_COOKIE['sid'])) { // recupere les cookies dans le tableau et verifie que c'est different de vide
    $select_sid = "SELECT COUNT(*) as nb_sid, " // requete de selection sql
            . "nom, "
            . "prenom, "
            . "id "
            . "FROM utilisateurs "
            . "WHERE sid = :sid ";


    /* @var $bdd PDO */
    $sth = $bdd->prepare($select_sid); // prepare la requete
    $sth->bindValue(':sid', $_COOKIE['sid'], PDO::PARAM_STR); // sécurisation des variables

    $sth->execute();
    $tab_result = $sth->fetch(PDO::FETCH_ASSOC); // on prend les resultat dans un tableau

    if ($tab_result['nb_sid'] > 0) { // si le resultat est superieur a 0
        $is_connect = TRUE; // mettre l'utilisateur connecté
        $nom_connect = $tab_result['nom']; // attribut le nom de l'utilisateur
        $prenom_connect = $tab_result['prenom']; // attribut le prenom de l'utilisateur
        $id_connect = $tab_result['id']; // attribut l'id
    }
}
?>
