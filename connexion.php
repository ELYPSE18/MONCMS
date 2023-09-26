<?php
  //on doit se connecter à la base de données pour pouvoir faire des actions dessus
  //pour cela , on va inclure le fichier connect.php
session_start();

  require_once 'admin/connect.php';

  /*
  Récupération des posts login et mot de passe

  Vérification en base de données si correspondance

  Si c'est le cas > redirection sur la page profile.php

  Sinon > Redirection sur la page membre.php

  */

  //on récupère les données du formulaire de connexion

  $mail = null;
  $mdp = null;

  if(isset($_POST['mail']) && isset($_POST['mdp'])) {
      $mail = $_POST['mail'];
      $mdp = $_POST['mdp'];
  } else {
      header('Location: membre.php'); // page de connexion
  }

  //on récupère les données de l'utilisateur en base de données

  $requete = $db->prepare("SELECT * FROM users WHERE mail = :mail");
  $requete->execute(array(
      'mail' => $mail
  ));

  $result = $requete->fetch();
  
  //on compare le mot de passe envoyé en post avec le mot de passe de la base de données

  if(password_verify($mdp, $result['mdp'])) {
      $_SESSION['user'] = $result['niveau_compte'];
      $_SESSION['user_id'] = $result['id'];
  }

  //on vérifie si l'utilisateur est connecté, sinon on le redirige vers la page de connexion

  if(isset($_SESSION['user']) || $_SESSION['user'] == "membre") {
      header('Location: profile.php');
  } 




?>
     