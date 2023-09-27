<!-- modification articles complet php -->


<?php

$message = "";

session_start();
require_once('connect.php');

// Récupérer l'id de l'article à modifier
$id = $_GET['id'];

// Récupérer les données de l'article à modifier

$requete = $db->prepare("SELECT * FROM articles WHERE id = :id");
$requete->execute(array(
    'id' => $id
));

$article = $requete->fetch();

// Modifier l'article dans la base de données

if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['categorie']) && isset($_POST['statut'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $categorie = $_POST['categorie'];
    $statut = $_POST['statut'];

    $updateQuery = $db->prepare("UPDATE articles SET titre = :titre, contenu = :contenu, categorie = :categorie, statut = :statut WHERE id = :id");
    $updateQuery->execute(array(
        'titre' => $titre,
        'contenu' => $contenu,
        'categorie' => $categorie,
        'statut' => $statut,
        'id' => $id
    ));

    header('Location: listearticles.php');
}

// Afficher le formulaire de modification de l'article

/*
    Récupérer l'id qui vient de l'url
    faire un appel à ta base de données pour récupérer l'article qui possède cet ID
    afficher les données récupérées dans le formulaire grâce au "value" des inputs
*/




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="articles">
            <h2>Articles</h2>
            <p><?=$message?></p>
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="titre">Titre</label>
                <input type="text" name="titre" value="<?=$article['titre']?>" id="titre" placeholder="Votre titre" required>
                <label for="image">Image</label>
                <img src="../uploads/<?=$article["image"]?>">
                <input type="file" name="image" id="image" placeholder="Votre image" required>
                <label for="contenu">Contenu</label>
                <input type="text" name="contenu" value="<?=$article['contenu']?>" id="contenu" placeholder="Votre contenu" required>
                <label for="date">Date de publication</label>
                <input type="date" name="date" value="<?=$article['date']?>" id="date" placeholder="Votre date" required>
                <label for="categorie">Catégorie</label>
                <input type="text" name="categorie" value="<?=$article['categorie']?>" id="categorie" placeholder="Votre catégorie" required>
                <label for="statut">Statut</label>
                <input type="text" name="statut" value="<?=$article['statut']?>" id="statut" placeholder="Votre statut" required>
                <input type="submit" value="Mettre à jour !">

            </form>
        </section>
</body>
</html>
