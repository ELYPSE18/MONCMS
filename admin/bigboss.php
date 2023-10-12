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
            <form action="dashboard.php" method="post">
                <label for="email">Email</label>
                <input type="email" name="mail" id="email" placeholder="Votre email" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="mdp" id="password" placeholder="Votre mot de passe" required>
                <input type="submit" value="Se connecter">
            </form>
        </section>

    
    
</body>
</html>