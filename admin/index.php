<?php
header('Location: dashboard.php');
?>

<?php
require_once('connect.php');

function afficherArticles() {
    global $db;
    $requete = $db->prepare("SELECT * FROM articles");
    $requete->execute();
    $articles = $requete->fetchAll();
    
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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <?php
    afficherArticles();
    ?>
</body>
</html>
