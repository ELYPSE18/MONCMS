
<?php
session_start();
require_once('connect.php'); // Inclure le fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $statut = $_POST['statut'];

    // Insérer les données dans la base de données
    $insert_query = $db->prepare("INSERT INTO pages (titre, contenu, statut) VALUES (:titre, :contenu, :statut)");

    $insert_query->execute(array(
        'titre' => $titre,
        'contenu' => $contenu,
        'statut' => $statut
    ));

    // Rediriger vers une page de confirmation ou de gestion des pages
    header('Location: gestion_pages.php');
}
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listepages.css">
    <title>Création de page</title>
</head>
<body>

<?php
include('header.php');
?>
    <h1>Création de page</h1>
    <form action="#" method="post">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br><br>
        <label for="contenu">Contenu de la page :</label><br>
        <textarea id="contenu" name="contenu" rows="4" cols="50" required></textarea><br><br>
        <label for="statut">Statut de publication :</label>
        <select id="statut" name="statut">
            <option value="Publié">Publié</option>
            <option value="En attente de relecture">En attente de relecture</option>
            <option value="En brouillon">En brouillon</option>
        </select><br><br>

        <input type="submit" value="Créer la page">
    </form>

<?php
include('footer.php');
?>

</body>
</html>
