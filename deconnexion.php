<?php

// suppression de cookie
setcookie('sid', '', -1);
header('Location: index.php'); // redirection sur l'index
exit();

?>
