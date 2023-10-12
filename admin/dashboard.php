<?php
/*  Cette page ne doit s'afficher que si l'utilisateur est connecté
    
    Cette page doit permettre :
        - de créer un nouvel article
        - de créer un nouvel article
        - de gérer les comptes utilisateurs

     Sur cette page vous devez également afficher : 
        - les derniers articles (5 derniers articles)
        - les 5 dernieres pages
        - les 5 derniers utilisateurs

    Vous devez avoir la possibilité de :
        - afficher la liste complete des articles
        - afficher la liste complete des pages
        - afficher la liste complete des utilisateurs

    
*/


session_start(); // Démarrer une session
require_once('connect.php'); // Inclure le fichier de connexion à la base de données





// Vérifier si l'administrateur est connecté, sinon rediriger vers la page de connexion
if( $_SESSION['user'] !== "administrateur") {
    header('Location: bigboss.php');
}

// Le reste du contenu de votre tableau de bord ici
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord Administrateur</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <?php
    include('header.php');
    ?>

<!-- <div><a href="/"><img src="../img/logo.jpg" alt="def du logo"></a></div> -->

    <?php
    // Si le mot de passe est correct, on connecte l'utilisateur et on stock sur les session user : le niveau de compte (administrateur)

    if (isset($_SESSION['user']) && $_SESSION['user'] === "administrateur") {
        echo "<h1>Bienvenue sur la page d'administration</h1>";
        echo "<p><a href='listepages.php'>Liste pages</a></p>";
        echo "<p><a href='listeutilisateurs.php'>Afficher les cinqs derniers utilisateurs</a></p>";
    } else {
        echo "Vous n'êtes pas autorisé à accéder à cette page.";
    }
    ?>


<!-- recupérer les article créer dans la base de données et les afficher dans la page listearticles.php -->

<?php

require_once('connect.php');

// Récupérer les articles de la base de données

$requete = $db->prepare("SELECT * FROM articles order by id desc limit 5");
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


<h1>Liste des cinq derniers articles</h1>
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





