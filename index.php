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
</head>
<body>
    <header>

    <div><a href="/"><img src="img/logo.jpg" alt="def du logo"></a></div>
        
            
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

        <!-- Affichage des articles récents -->
        <section class="recent-articles">
            <h2>Articles récents</h2>
            <!-- Insérez ici le code pour afficher les articles récents depuis la base de données -->
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Mon CMS</p>
        <p>Ce code HTML représente simplement la structure de la page d'accueil de votre CMS. Pour implémenter toutes les fonctionnalités décrites, vous devrez créer des fichiers séparés pour les pages, les articles, les utilisateurs, etc., et utiliser du JavaScript pour gérer les interactions côté client. De plus, vous devrez créer des scripts PHP pour gérer les interactions avec la base de données et les fonctionnalités côté serveur.

N'oubliez pas de créer un repository GitHub pour votre projet et de le structurer correctement avec des commits réguliers pour suivre le développement du projet. Ce code HTML est un point de départ, mais il représente une petite partie d'un projet beaucoup plus vaste.</p>

    </footer>

    <!-- Inclure ici vos fichiers JavaScript -->
    <script src="script.js"></script>
</body>
</html>





