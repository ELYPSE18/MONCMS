<?php
/*  Cette page ne doit s'afficher que si l'utilisateur est connecté
    
    Cette page doit permettre :
        - de créer un nouvel article
        - de créer un nouvel article
        - de gérer les comptes utilisateurs

     Sur cette page vous devez également afficher : 
        - les derniers articles (5 derniers articles)
        - les 5 dernieres pages
        - les 5 derniers utilisateurs

    Vous devez avoir la possibilité de :
        - afficher la liste complete des articles
        - afficher la liste complete des pages
        - afficher la liste complete des utilisateurs

    
*/


session_start(); // Démarrer une session
require_once('connect.php'); // Inclure le fichier de connexion à la base de données


//  Réception des données du formulaire de connexion $_POST
$mail = null;
$mdp = null;
if(isset($_POST['mail']) && isset($_POST['mdp'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
} else {
    header('Location: bigboss.php'); // page de connexion
}

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
}


// Vérifier si l'administrateur est connecté, sinon rediriger vers la page de connexion
if(!isset($_SESSION['user']) || $_SESSION['user'] !== "administrateur") {
    header('Location: bigboss.php');
}

// Le reste du contenu de votre tableau de bord ici
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord Administrateur</title>
</head>
<body>

    <?php
    // Si le mot de passe est correct, on connecte l'utilisateur et on stock sur les session user : le niveau de compte (administrateur)

    if (isset($_SESSION['user']) && $_SESSION['user'] === "administrateur") {
        echo "<h1>Bienvenue sur la page d'administration</h1>";
        echo "<p><a href='logout.php'>Se déconnecter</a></p>";
    } else {
        echo "Vous n'êtes pas autorisé à accéder à cette page.";
    }
    ?>
</body>
</html>


