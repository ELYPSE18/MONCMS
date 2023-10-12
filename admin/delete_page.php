<?php
session_start();
require_once('connect.php'); // Inclure le fichier de connexion à la base de données

if (isset($_GET['id'])) {
    $page_id = $_GET['id'];

    // Récupérer les données de la page à supprimer depuis la base de données
    $query = $db->prepare("SELECT * FROM pages WHERE id = :id");
    $query->execute(array('id' => $page_id));
    $page = $query->fetch();

    if ($page) {
        // Afficher le formulaire de confirmation de suppression
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Supprimer la Page</title>
        </head>
        <body>
            <h1>Supprimer la Page</h1>
            <p>Êtes-vous sûr de vouloir supprimer la page "<?php echo $page['titre']; ?>" ?</p>
            <form action="process_delete_page.php" method="post">
                <input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
                <input type="submit" value="Confirmer la suppression">
            </form>
            <p><a href="gestion_pages.php">Annuler</a></p>
        </body>
        </html>
        <?php
    } else {
        // Gérer le cas où la page avec l'ID spécifié n'existe pas
        echo "Page introuvable.";
    }
} else {
    // Gérer le cas où l'ID de la page n'est pas spécifié dans l'URL
    echo "ID de la page non spécifié.";
}
?>
