<?php

//fonction de cryptage pour le mot de passe
function cryptPassword($mdp) {
    $mdp_crypt = sha1($mdp);
    return $mdp_crypt;
}

// fonction permettant de concatener l'email a l'execution
function sid($email) {
    $sid = md5($email . time());
    return $sid;
}

// fonction de retour d'index pour pagination
function pagination($page_courante, $nb_articles_par_page) {
    $index = ($page_courante - 1) * $nb_articles_par_page;
    return $index;
}

// fonction pour connaitre le nombre d'article total
function nb_total_article_publie($bdd) {
    /* @var $bdd PDO */
    $sql = "SELECT COUNT(*) as nb_total_article_publie "
            . "FROM articles "
            . "WHERE publie = 1";

    $sth = $bdd->prepare($sql);
    $sth->execute();
    $tab_result = $sth->fetch(PDO::FETCH_ASSOC); // difference entre fetch_all tableau imbriqué et fetch retourne que le premier enregistrement (tableau a une seule dimension)

    return $tab_result['nb_total_article_publie']; // on retourne la valeur de la clé
}

?>