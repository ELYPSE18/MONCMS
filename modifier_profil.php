<?php

session_start();
require_once "admin/connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérifier si l'utilisateur est authentifié
    if (isset($_SESSION['user_id'])) {
        // Supprimer le compte de l'utilisateur de la base de données
        $userId = $_SESSION['user_id'];
        $deleteQuery = $db->prepare("DELETE FROM users WHERE id = :userId");
        $deleteQuery->execute(array(
            'userId' => $userId
        ));

        // Déconnecter l'utilisateur
        session_destroy();

        // Rediriger l'utilisateur vers une page de confirmation ou une page d'accueil
        header("Location: confirmation_suppression.php");
        exit();
    } else {
        // Rediriger l'utilisateur vers une page d'erreur ou de déconnexion
        header("Location: erreur.php");
        exit();
    }
}

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le compte</title>
    <link rel="stylesheet" href="modifier_profil.css"> 
</head>
<body>
    <div class="modification-container">
        <h1>Modifier le compte</h1>
        <form action="modifier_compte.php" method="post">
            
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required>
            <label for="newEmail">Nouvelle adresse e-mail :</label>
            <input type="email" name="newEmail" id="newEmail" required>
            <label for="newPassword">Nouveau mot de passe :</label>
            <input type="password" name="newPassword" id="newPassword">
            <label for="newPasswordConfirm">Confirmez le nouveau mot de passe :</label>
            <input type="password" name="newPasswordConfirm" id="newPasswordConfirm">            
            <label for="pseudo">Pseudo</label>
            <input type="pseudo" name="pseudo" id="pseudo" placeholder="Votre pseudo" required>
            <input type="submit" value="Modifier">

        </form>
    </div>
</body>
</html>






