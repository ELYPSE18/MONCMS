<!--Déconnexion de la page d'administration et redirection vers l'index.php-->



<?php
session_start();



// Détruisez la session pour déconnecter l'utilisateur
session_destroy();
session_unset();

// Redirigez l'utilisateur vers index.php ou une autre page de votre choix
header('Location: ../index.php');

exit();

?>
