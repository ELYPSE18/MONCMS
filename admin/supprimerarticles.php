supprimer articles.php

<?php
session_start();
require_once('connect.php');

// Récupérer l'id de l'article à supprimer
$id = $_GET['id'];

// Supprimer l'article de la base de données

$requete = $db->prepare("DELETE FROM articles WHERE id = :id");
$requete->execute(array(
    'id' => $id
));

// Rediriger l'utilisateur vers la page listearticles.php

header('Location: listearticles.php');

?>