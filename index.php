<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon CMS - Page d'accueil</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <header>

    <div><a href="index.php"><img src="img/logo.jpg" alt="def du logo"></a></div>
        
            
        <nav>
            <ul>
                <li><a href="admin/bigboss.php">Administrateur</a></li>
                <?php
                // Si tu n'es pas connecté, ça affiche les liens du menu
                $isUserConnected = isset($_SESSION['user_id']) ? true : false;

                if(!$isUserConnected): ?>
                    <li><a href="membre.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>

                <?php endif; ?>

                <!-- Quand l'utilisateur est connecté :
            Le lien connexion et inscription doivent dégager
            Il doit y avoir deux nouveaux liens :
                - Déconnexion
                - Profil     -->

                <?php if($isUserConnected): ?>
                    <li><a href="logout.php">Déconnexion</a></li>
                    <li><a href="profile.php">Profil</a></li>

                <?php endif; ?>




                <!-- Ajoutez d'autres liens de navigation ici -->
            </ul>
        </nav>
    </header>

    <main>
        <section class="welcome">
            <h2>Bienvenue sur Mon CMS</h2>
            <p>C'est un exemple simplifié de la page d'accueil.</p>
        </section>

        <?php
require_once('admin/connect.php');

function afficherArticles() {
    global $db;
    $requete = $db->prepare("SELECT * FROM articles");
    $requete->execute();
    $articles = $requete->fetchAll();
    
    foreach ($articles as $article) {
        echo "<article>";
        echo "<h2>" . $article['titre'] . "</h2>";
        echo "<p>" . $article['contenu'] . "</p>";
        echo "<p>" . $article['date'] . "</p>";
        echo "<p>" . $article['categorie'] . "</p>";
        echo "<p>" . $article['statut'] . "</p>";
        echo "<img src='uploads/" . $article['image'] . "' alt='image de l'article'>";
        echo "<a href='modifierarticles.php?id=" . $article['id'] . "'>Modifier</a>";
        echo "<a href='supprimerarticles.php?id=" . $article['id'] . "'>Supprimer</a>";
        echo "</article>";
    }
}

?>

        <!-- Affichage des articles récents -->
        <section class="articles">
            <h2>Articles récents</h2>
            <?php
    afficherArticles();
    ?>


            <!-- Insérez ici le code pour afficher les articles récents depuis la base de données -->
        </section>
    </main>

    <footer>
<?php
include('footer.php');
?>

    </footer>

    <!-- Inclure ici vos fichiers JavaScript -->
    <script src="script.js"></script>
   
</body>
</html>






