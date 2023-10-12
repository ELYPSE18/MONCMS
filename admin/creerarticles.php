<!-- Création d’articles 
    Titre 
    Image mise en avant 
    Contenu de l’article 
    Date de publication 
    Catégorie d’article 
    Statut de publication -->


    <?php
    session_start();
    require_once('connect.php');

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $titre = $_POST["titre"];
    $image = $_FILES["image"]["name"];
    $contenu = $_POST["contenu"];
    $date = $_POST["date"];
    $categorie = $_POST["categorie"];
    $statut = $_POST["statut"];

    // Traiter les images :
    // 1. Vérifier si l'image est valide
    // 2. Déplacer l'image dans le dossier images
    // 3. Enregistrer le nom de l'image dans la base de données

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations sur le fichier téléchargé
    $nomFichier = $_FILES["image"]["name"];
    $typeFichier = $_FILES["image"]["type"];
    $tailleFichier = $_FILES["image"]["size"];
    $fichierTemporaire = $_FILES["image"]["tmp_name"];
    $erreurFichier = $_FILES["image"]["error"];

    // Vérifier s'il y a une erreur lors du téléchargement
    if ($erreurFichier === 0) {
        // Définir le répertoire de destination où vous souhaitez sauvegarder le fichier
        $nomFichier = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $destination = "../uploads/" . $nomFichier; // Assurez-vous que le répertoire "uploads" existe

        // Déplacer le fichier temporaire vers le répertoire de destination
        if (move_uploaded_file($fichierTemporaire, $destination)) {
            echo "Le fichier a été téléchargé avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement du fichier.";
        }
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }
}


    // Vérifier si les données sont valides

    // Enregistrer les données dans la base de données

    $requete = $db->prepare("INSERT INTO articles (titre, image, contenu, date, categorie, statut) VALUES (:titre, :image, :contenu, :date, :categorie, :statut)");
    $requete->execute(array(
        'titre' => $titre,
        'image' => $nomFichier,
        'contenu' => $contenu,
        'date' => $date,
        'categorie' => $categorie,
        'statut' => $statut
    ));

    $message = "Votre article a bien été créé";
}




    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="creerarticles.css">
        <link rel="stylesheet" href="header.css">
        <title>Articles</title>
    </head>
    <body>

    <?php
    include('header.php');
    ?>

        <section class="articles">
            <h2>Articles</h2>
            <p><?=$message?></p>
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" placeholder="Votre titre" required>
                <label for="image">Image</label>
                <input type="file" name="image" id="image" placeholder="Votre image" required>
                <label for="contenu">Contenu</label>
                <input type="text" name="contenu" id="contenu" placeholder="Votre contenu" required>
                <label for="date">Date de publication</label>
                <input type="date" name="date" id="date" placeholder="Votre date" required>
                <label for="categorie">Catégorie</label>
                <input type="text" name="categorie" id="categorie" placeholder="Votre catégorie" required>
                <label for="statut">Statut</label>
                <input type="text" name="statut" id="statut" placeholder="Votre statut" required>
                <input type="submit" value="Créer">

            </form>
        </section>

        <?php
        include('footer.php');
        ?>
        
    </body>
    </html>