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