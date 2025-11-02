<?php

    include "./database.php";

    // récupère les informations du formulaire en POST
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $photo = isset($_POST['photo']) ? $_POST['photo'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $prix = isset($_POST['prix']) ? $_POST['prix'] : "";
    $date = date("Y-m-d");
    $erreur = "";
    
    //requète permettant de récupérer l'id du type de vêtement correspondant
    $type = isset($_POST['type']) ? $_POST['type'] : "";

    $requete_id_type = "SELECT id_Type_De_Vetement FROM type_de_vetement WHERE nom ='".$type."'";

    $prep_id_type = $con->prepare($requete_id_type);

    $prep_id_type->execute();

    $str_id_type = $prep_id_type->fetch();

    //requète permettant de récupérer l'id de la catégorie correspondante
    $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : "";

    $requete_categorie = "SELECT id_categorie FROM categorie WHERE nom ='".$categorie."'";

    $prep_categorie = $con->prepare($requete_categorie);

    $prep_categorie->execute();

    $str_categorie = $prep_categorie->fetch();

    //requète pour récupérer les clients qui veulent une notification correspondant à cette catégorie
    $sql = "SELECT id_utilisateur FROM notification WHERE id_Categorie = " . $str_categorie['id_categorie'];

    $reqp = $con->prepare($sql);

    $reqp->execute();

    $utilisateurs = $reqp->fetchAll();

    foreach ($utilisateurs as $utilisateur) { //on met une notification pour chaque client(s) concerné(s)
        $sql = " UPDATE administrateur SET notification = ".$str_categorie['id_categorie']." WHERE id_administrateur = ".$utilisateur['id_utilisateur'];
        $reqp = $con->prepare($sql);
        $reqp->execute();
        
        $sql = " UPDATE client SET notification = ".$str_categorie['id_categorie']." WHERE id_client = ".$utilisateur['id_utilisateur'];
        $reqp = $con->prepare($sql);
        $reqp->execute();

        $sql = " UPDATE vendeur SET notification = ".$str_categorie['id_categorie']." WHERE id_vendeur = ".$utilisateur['id_utilisateur'];
        $reqp = $con->prepare($sql);
        $reqp->execute();

    }
    // test si les champs sont renseignés
    if (empty($nom)) {
        $erreur .= "Le champ nom n'est pas renseigné<br>";
    }
    if (empty($photo)) {
        $erreur .= "Le champ photo n'est pas renseigné<br>";
    }
    if (empty($description)) {
        $erreur .= "Le champ description n'est pas renseigné<br>";
    }
    if (empty($prix)) {
        $erreur .= "Le champ prix n'est pas renseigné<br>";
    }
  

    // test si il ni a pas d'erreur et que le bouton valider à été cliqué
    if (empty($erreur) && isset($_POST['valider'])) {

        // requete d'insert
        $sql = "INSERT INTO  article (nom , photo , description , prix_Initial , date_Publication ,id_Categorie , id_Type_De_Vetement ) 
        VALUES (:nom , :photo , :description , :prix , :date , :idC , :idT );";
        
        
        // prépare la requete
        $reqp = $con->prepare($sql);
        
        // lier les données
        $reqp->bindValue(":nom", $nom);
        $reqp->bindValue(":photo", $photo);
        $reqp->bindValue(":description", $description);
        $reqp->bindValue(":prix", $prix);
        $reqp->bindValue(":date", $date);
        $reqp->bindValue(":idC",  $str_categorie['id_categorie']);
        $reqp->bindValue(":idT",  $str_id_type['id_Type_De_Vetement']);



        // exécute la requette
        $reqp->execute();
    

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <title>Validation inscription</title>
        <link rel="stylesheet" href="traitement_form.css">
    </head>
    <body>
    <header>
        <img src=".\images\logo.png" alt="logo" >
        <section class="top-page">
                    <nav class="nav">
                        <li><a class="button blanc" href="site.php">ACCUEIL</a></li>
                        <li><a class="button blanc" href="tout_parcourir.php">TOUT<br> PARCOURIR</a></li>
                        <li><a class="button blanc" href="page-Notifications.php">NOTIFICATIONS</a></li>
                        <li><a class="button blanc" href="panier1.php">PANIER</a></li>
                        <li><a class="button bleu" href="mon_compte.php">COMPTE</a></li>
                    </nav>
        </section>    
        <div class="container">
            <img class="habillage" src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
        <div class="droite">
        <?php


            if (empty($erreur)) {
                echo "<h2>Article enregistre<br></hr>";
                
            }
            else {
                echo $erreur;                
            }
        ?>
        <a href="./mon_compte.php"><button class="button" type="submit">OK</button>
        </div>
        <br>
        <footer>
        <section class="background-beige">
            <nav class="nav-en-colonne">
                <h2 class="text-strong size-m couleur3">CONTACTEZ-NOUS</h2>
                <ul>
                    <li><a class="text-gray" href="">Email:hello@friperieSLF.com</a></li>
                    <li><a class="text-gray" href="">Instagram: @friperieSLF</a></li>
                 </ul>
            </nav>
            
            

            <div class="container">
                <img src=".\images\logo.png"alt="logo de notre site" class="img2">
            </div>


        </section>
        

    </footer>
    </body>
</html>