
<?php

session_start();

require_once "connect.php"; // Inclure le fichier de connexion à la base de données

// Afficher les données
$data = $db->prepare('SELECT nom, prenom, mail, pseudo, avatar, niveau_compte FROM users WHERE id = :id');


$data->execute(array(
    'id' => $_SESSION['user_id']
));

$results = $data->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
 
    <title>Profil de l'utilisateur</title>
</head>
<body>

<?php
include('header.php');
?>

<section class="profil">
    <h2>Profil de l'utilisateur</h2>
    <?php foreach ($results as $result): ?>
        <ul class="info-list">
            <li><span class="label">Nom :</span> <?php echo $result['nom']; ?></li>
            <li><span class="label">Prénom :</span> <?php echo $result['prenom']; ?></li>
            <li><span class="label">Email :</span> <?php echo $result['mail']; ?></li>
            <li><span class="label">Pseudo :</span> <?php echo $result['pseudo']; ?></li>
            <li><span class="label">Avatar :</span> <img src="<?php echo $result['avatar']; ?>" alt="Avatar"></li>
            <li><span class="label">Niveau de compte :</span> <?php echo $result['niveau_compte']; ?></li>
        </ul>
    <?php endforeach; ?>

    <p><a href='logout.php'>Se déconnecter</a></p>
</section>

<!-- Formulaire de modification de profil -->
<div class="modifier-profile">
    <h3 >Modifier le profil</h3>
    <a href="modifier_profil.php">Modifier</a>
</div>

<!-- Formulaire de suppression de compte -->
<form class="delete-account" action="supprimer_compte.php" method="post">
    <h3>Supprimer le compte</h3>
    <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
    <input type="submit" value="Supprimer le compte">
</form>

<?php
include('footer.php');
?>

</body>
</html>




