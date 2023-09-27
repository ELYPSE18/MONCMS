<!-- recupérer les article créer dans la base de données et les afficher dans la page listearticles.php -->

<?php
session_start();
require_once('connect.php');

// Récupérer les articles de la base de données

$requete = $db->prepare("SELECT * FROM articles");
$requete->execute();

$articles = $requete->fetchAll();

// Afficher les articles dans la page listearticles.php



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listearticles.css">
    <title>Document</title>
</head>
<body>
    <?php
    foreach($articles as $article) {
        echo "<h2>" . $article['titre'] . "</h2>";
        echo "<p>" . $article['contenu'] . "</p>";
        echo "<p>" . $article['date'] . "</p>";
        echo "<p>" . $article['categorie'] . "</p>";
        echo "<p>" . $article['statut'] . "</p>";
        echo "<a href='modifierarticles.php?id=" . $article['id'] . "'>Modifier</a>";
        echo "<a href='supprimerarticles.php?id=" . $article['id'] . "'>Supprimer</a>";
    }
    ?>
</body>
</html>