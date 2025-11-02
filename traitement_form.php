<?php

    include "./database.php";

    // récupère les informations du formulaire en POST
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $role = isset($_POST['role']) ? $_POST['role'] : "";
    $type_Paiement= isset($_POST['type_Paiement']) ? $_POST['type_Paiement'] : "";
    $numero_Carte = isset($_POST['numero_Carte']) ? $_POST['numero_Carte'] : "";
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $date_Expiration_Carte = isset($_POST['date_Expiration_Carte']) ? $_POST['date_Expiration_Carte'] : "";
    $Code_Securite = isset($_POST['Code_Securite']) ? $_POST['Code_Securite'] : "";

    $erreur = "";

    // test si les champs sont renseignés
    if (empty($nom)) {
        $erreur .= "Le champ nom n'est pas renseigné<br>";
    }
    if (empty($prenom)) {
        $erreur .= "Le champ prénom n'est pas renseigné<br>";
    }
    if (empty($email)) {
        $erreur .= "Le champ email n'est pas renseigné<br>";
    }
    if (empty($password)) {
        $erreur .= "Le champ password n'est pas renseigné<br>";
    }
    
    if (empty($type_Paiement)) {
    $erreur .= "Le champ type de paiement n'est pas renseigné<br>";
    }
    
    if (empty($numero_Carte)) {
    $erreur .= "Le champ numéro de carte n'est pas renseigné<br>";
    }

    if (empty($nom)) {
    $erreur .= "Le champ nom n'est pas renseigné<br>";
    }
    if (empty($date_Expiration_Carte)) {
    $erreur .= "Le champ date d'expiration n'est pas renseigné<br>";
    }
    if (empty($Code_Securite)) {
    $erreur .= "Le champ code de securité n'est pas renseigné<br>";
    }
  

    // test si il ni a pas d'erreur et que le bouton valider à été cliqué
    if (empty($erreur) && isset($_POST['valider'])) {

        //insérer les informations d'un utilisateur lors de son inscription sur le site (client, vendeur et administrateur)
        $sql = "INSERT INTO  $role (nom, prenom, email, mdp) 
        VALUES (:nom, :prenom, :email, :password);";
        $reqp = $con->prepare($sql);
        
      
        $reqp->bindValue(":nom", $nom);
        $reqp->bindValue(":prenom", $prenom);
        $reqp->bindValue(":email", $email);
        $reqp->bindValue(":password", $password);

        $reqp->execute();

        //récupérer l'id de l'utilisateur (client, vendeur ou administrateur)
        $sql2 = "SELECT id_".$role." FROM ".$role." WHERE email = '".$email."'";

        $reqp2 = $con->prepare($sql2);

        $reqp2->execute();

        $id = $reqp2->fetch()["id_".$role];

        

        //insérer les informations sur son mode de paiement d'un utilisateur lors de son inscription sur le site (client, vendeur et administrateur)
        $sql1="INSERT INTO paiement(type_Paiement, numero_Carte, nom, date_Expiration_Carte, Code_Securite, id_".$role.") 
        VALUES ('".$type_Paiement."', '".$numero_Carte."', '".$nom."', '".$date_Expiration_Carte."', ".$Code_Securite." , ".$id.")";

        $reqp1 = $con->prepare($sql1);
        
        $reqp1->execute();
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
                        <li><a class="button blanc" href="ta-page.html">ACCUEIL</a></li>
                        <li><a class="button blanc" href="tout_parcourir.html">TOUT<br> PARCOURIR</a></li>
                        <li><a class="button blanc" href="page-Notifications">NOTIFICATIONS</a></li>
                        <li><a class="button blanc" href="page-Panier">PANIER</a></li>
                        <li><a class="button bleu" href="mon_compte.html">COMPTE</a></li>
                    </nav>
        </section>    
        <div class="container">
            <img class="habillage" src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
        <div class="droite">
        <?php


            if (empty($erreur)) {
                echo "<h2>Inscription valide<br></hr>";
                
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
