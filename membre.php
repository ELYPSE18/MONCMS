<?php
session_start();

// Vérifiez si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    // Utilisateur connecté, redirigez-le vers la page du profil
    header('Location: profile.php'); // Remplacez "profile.php" par le chemin de votre page de profil
    exit();
}

// Si l'utilisateur n'est pas encore connecté, affichez le formulaire de connexion
?>


<!DOCTYPE html>
<html>
<head>
    <title>Page des membres</title>
    <link rel="stylesheet" href="membre.css">


</head>
<body>

<section class="connexion">
            <h2>Connexion</h2>
            <form action="connexion.php" method="post">
                <label for="email">Email</label>
                <input type="email" name="mail" id="email" placeholder="Votre email" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="mdp" id="password" placeholder="Votre mot de passe" required>
                <input type="submit" value="Se connecter">

            </form>
        </section>

     




    
</body>
</html>