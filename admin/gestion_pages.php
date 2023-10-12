<?php
session_start();
require_once('connect.php'); // Inclure le fichier de connexion à la base de données

// Fonction pour afficher la liste des pages
function afficherPages() {
    global $db;

    $query = $db->prepare("SELECT * FROM pages");
    $query->execute();
    $pages = $query->fetchAll();

    if (count($pages) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Titre</th>";
        echo "<th>Statut</th>";
        echo "</tr>";

        foreach ($pages as $page) {
            echo "<tr>";
            echo "<td>{$page['titre']}</td>";
            echo "<td>{$page['statut']}</td>";
            echo "<td><a href='modifier_page.php?id={$page['id']}'>Modifier</a> | <a href='supprimer_page.php?id={$page['id']}'>Supprimer</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Aucune page trouvée.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Pages</title>
</head>
<body>
    <h1>Gestion des Pages</h1>
    
    <!-- Afficher la liste des pages -->
    <?php afficherPages(); ?>

    <p><a href="create_page.php">Créer une nouvelle page</a></p>

    <!-- Ajoutez des liens pour d'autres actions ou fonctionnalités si nécessaire -->
</body>
</html>