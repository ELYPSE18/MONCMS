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






