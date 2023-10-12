<?php
session_start();
require_once('connect.php');

//  Réception des données du formulaire de connexion $_POST
$mail = null;
$mdp = null;
if(isset($_POST['mail']) && isset($_POST['mdp'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    // Récupération des données de la base de données avec le mail envoyé en post
    
    $requete = $db->prepare("SELECT * FROM users WHERE mail = :mail");
    $requete->execute(array(
        'mail' => $mail
    ));
    
    $result = $requete->fetch();
    
    // Comparaison du mot de passe envoyé en post avec le mot de passe de la base de données
    if(password_verify($mdp, $result['mdp'])) {
        $_SESSION['user'] = $result['niveau_compte'];
        $_SESSION['user_id'] = $result['id'];
        header('Location: dashboard.php');
    }
}


?>

<!-- création de la page de connexion de l'admin -->


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="bigboss.css">
    <title>Page d'administration</title>


</head>
<body>

<div><a href="dashboard.php"><img src="../img/logo.jpg" alt="def du logo"></a></div>
  
<section class="connexion">
            <h2>Connexion</h2>
            <form action="#" method="post">
                <label for="email">Email</label>
                <input type="email" name="mail" id="email" placeholder="Votre email" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="mdp" id="password" placeholder="Votre mot de passe" required>
                <input type="submit" value="Se connecter">
            </form>
        </section>

    
    
</body>
</html>