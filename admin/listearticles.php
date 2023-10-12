<!-- recupérer les article créer dans la base de données et les afficher dans la page listearticles.php -->

<?php
session_start();
require_once('connect.php');

// Récupérer les articles de la base de données

$requete = $db->prepare("SELECT * FROM articles ");
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
    <link rel="stylesheet" href="header.css">
    <title>Liste articles</title>
</head>
<body>

    <?php
    include('header.php');
    ?>

<h1>Liste des articles</h1>
<section class="article-container">
    <?php
    foreach ($articles as $article) {
        echo "<article>";
        echo "<h2>" . $article['titre'] . "</h2>";
        echo "<p>" . $article['contenu'] . "</p>";
        echo "<p>" . $article['date'] . "</p>";
        echo "<p>" . $article['categorie'] . "</p>";
        echo "<p>" . $article['statut'] . "</p>";
        echo "<img src='../uploads/" . $article['image'] . "' alt='image de l'article'>";
        echo "<a href='modifierarticles.php?id=" . $article['id'] . "'>Modifier</a>";
        echo "<a href='supprimerarticles.php?id=" . $article['id'] . "'>Supprimer</a>";
        echo "</article>";
    }
    ?>
</section>



    <?php
    include('footer.php');
    ?>
   
</body>
</html>