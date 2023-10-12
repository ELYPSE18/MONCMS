<?php
session_start();
require_once('connect.php'); // Inclure le fichier de connexion à la base de données

if (isset($_GET['id'])) {
    $page_id = $_GET['id'];

    // Récupérez les données de la page à modifier depuis la base de données
    $query = $db->prepare("SELECT * FROM pages WHERE id = :id");
    $query->execute(array('id' => $page_id));
    $page = $query->fetch();

    if ($page) {
        // Afficher le formulaire de modification
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier la Page</title>
        </head>
        <body>
            <h1>Modifier la Page</h1>
            <form action="process_edit_page.php" method="post">
                <input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" value="<?php echo $page['titre']; ?>" required><br><br>

                <label for="contenu">Contenu de la page :</label><br>
                <textarea id="contenu" name="contenu" rows="4" cols="50" required><?php echo $page['contenu']; ?></textarea><br><br>

                <label for="statut">Statut de publication :</label>
                <select id="statut" name="statut">
                    <option value="Publié" <?php if ($page['statut'] === 'Publié') echo 'selected'; ?>>Publié</option>
                    <option value="En attente de relecture" <?php if ($page['statut'] === 'En attente de relecture') echo 'selected'; ?>>En attente de relecture</option>
                    <option value="En brouillon" <?php if ($page['statut'] === 'En brouillon') echo 'selected'; ?>>En brouillon</option>
                </select><br><br>

                <input type="submit" value="Enregistrer les modifications">
            </form>
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
