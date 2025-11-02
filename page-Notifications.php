<?php 
session_start();

include "./database.php";

if(isset($_SESSION['email'])){ //si il y a une session en cours
    $email= $_SESSION['email'];
    $role = $_SESSION['role'];
    $sqlemail="SELECT id_".$role." FROM ".$role."  where email='{$email}'"; //requète pour récuperer l'id de l'utilisateur (client, vendeur ou administrateur)
    $reqemail = $con->prepare($sqlemail);
    $reqemail->execute();
    $id_utilisateur=$reqemail->fetch();
    
    

    $sql = "SELECT id_utilisateur FROM notification WHERE id_utilisateur = ".$id_utilisateur['id_'.$role]." AND ".$role." = TRUE"; //requète qui renvoie true ou false si l'tilisateur a ou pas paramétré ses notifications
    $reqexist = $con->prepare($sql);
    $reqexist->execute();
    $isInNotif = $reqexist->fetch();
    
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="stylenotifications.css">
</head>
<body>
    <header>
        <img src="./images/logo.png"alt="logo de notre site"> 
        <section class="top-page">
                    <nav class="nav">
                        <li><a class="button blanc" href="site.php">ACCUEIL</a></li>
                        <li><a class="button blanc" href="tout_parcourir.php">TOUT<br> PARCOURIR</a></li>
                        <li><a <?php if(isset($_SESSION['notification']) && $_SESSION['notification'] != NULL){ echo 'class="button rouge"';    } else{  echo 'class = "button bleu"'; } ?> href="page-Notifications.php">NOTIFICATIONS</a></li>
                        <li><a class="button blanc" href="panier1.php">PANIER</a></li>
                        <li><a class="button blanc" href="mon_compte.php"><?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true){echo $_SESSION['prenom'];} 
                        else {
                            echo 'COMPTE';
                            }?></a></li>
                
                    </nav>
        </section>    
        <div class="container">
        <img class="habillage" src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
    
    <main>
        <form class="carré background-beige" action="alerte.php" method="POST">
             <h1>Alerte</h1>
             <?php
                if(!isset($_SESSION['email'])){ //si l'utilisateur n'est pas connecté ou n'a pas encore de compte sur notre site
                 echo 'Connectez vous pour parametrer vos notifications';
                }
             
              else if ($isInNotif == false) {  //si l'utilisateur n'a pas paramétré ses notifications ?>
             <p>Si vous voulez être alerté sur l'arrivée de nouveaux vêtements: <br> 1. selectionnez la ou les catégorie(s) <br> 2.Appuyez sur "Activez l'alerte"</p>

            <nav class="column">
                <h2 class="text-strong size-m">CATEGORIE(S)</h2>
                <ul class="nav2">
                    <li><input TYPE=CHECKBOX UNCHECKED name="vetement_rare" id="Checkbox1" value="yes" type="CHECKBOX"></br><a class="" href="">ARTICLES RARES</a></li>
                    <li><input TYPE=CHECKBOX UNCHECKED name="vetement_haut_de_gamme" id="Checkbox1" value="yes" type="CHECKBOX"></br><a class="" href="">ARTICLES HAUT DE GAMME</a></li>
                    <li><input TYPE=CHECKBOX UNCHECKED name="vetement_regulier" id="Checkbox1" value="yes" type="CHECKBOX"></br><a class="" href="">ARTICLES REGULIERS</a></li>
                 </ul>
     
                <button class="button" type="submit">Activez l'alerte</button>
            </form>



            </nav>


            <?php } 
            else if (isset($_SESSION['notification']) && $_SESSION['notification'] != NULL){ //on vérifie si il a des notifications et on les affiche
                $sql = "SELECT nom FROM categorie WHERE id_categorie =".$_SESSION['notification'];
                $req = $con->prepare($sql);
                $req->execute();
                $categorie = $req->fetch();

                 $str_cat = str_replace("_", " ", $categorie['nom']);

                 echo "Des articles correspondants à vos critères sont disponibles sur notre page tout-parcourir dans la rubrique " . $str_cat.".<br>";
                 echo "Cliquez ici pour acceder à la page tout-parcourir"; ?>
                 <a href= "supprimer.php">Aller a tout-parcourir</a>
                 <?php
            }
            else {
                 echo "Vos notifications sont parametrées. Aucun article correspondant à vos critères n'est arrivé sur le site pour l'instant."; //si l'utilisateur a paramétré ses notifications mais qu'il n'a pas de notification
             }
            ?>
        </div>
    </main>

        
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
                <img src="./images/logo.png"alt="logo de notre site" class="img2">
            </div>


        </section>
        

    </footer>  
    
    <script src="main.js"></script>

</body>


</html>