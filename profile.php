
<?php

session_start();

require_once "admin/connect.php"; // Inclure le fichier de connexion à la base de données

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
    <link rel="stylesheet" href="profil.css"> <!-- Inclure un fichier CSS pour le style -->
    <title>Profil de l'utilisateur</title>
</head>
<body>

<<section class="profil">
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

</body>
</html>




