<?php
session_start();
session_destroy(); // Supprime toutes les sessions
header("Location:  http://localhost/admin12/signin/index.php"); // Redirige vers la page de connexion
exit();
?>
