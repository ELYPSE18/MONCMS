<!-- formulaire d'inscription d'un nouvel utilisateur -->



<?php
session_start();
$message = null;
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['pseudo'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $pseudo = $_POST['pseudo'];
    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
    require_once('admin/connect.php');

    // faire une recherche dans la base de données pour vérifier si l'utilisateur existe déjà

    $requete = $db->prepare("SELECT * FROM users WHERE mail = :mail");
    $requete->execute(array(
        'mail' => $mail,
    ));

    $result = $requete->fetch();

    if ($result) {
        $message = "Cet utilisateur existe déjà";
    } else {
        $requete = $db->prepare("INSERT INTO users (nom, prenom, mail, mdp, pseudo, niveau_compte) VALUES (:nom, :prenom, :mail, :mdp, :pseudo, :niveau)");
        $requete->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'mail' => $mail,
            'mdp' => $mdp,
            'pseudo' => $pseudo,
            "niveau" => "membre"
        ));
        $message = "Votre compte a bien été créé. <a href='connexion.php'>Connectez-vous</a>";
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription</title>
</head>
<body>

    <section class="inscription">
        <h2>Inscription</h2>
        <p><?=$message?></p>
        <form action="#" method="post">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required>
            <label for="email">Email</label>
            <input type="email" name="mail" id="email" placeholder="Votre email" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="mdp" id="password" placeholder="Votre mot de passe" required>
            <label for="password">Confirmez votre mot de passe</label>
            <input type="password" name="mdp" id="password" placeholder="Confirmez votre mot de passe" required>
            <label for="pseudo">Pseudo</label>
            <input type="pseudo" name="pseudo" id="pseudo" placeholder="Votre pseudo" required>
            <input type="submit" value="S'inscrire">
        </form>
    </section>

   




    
</body>
</html>