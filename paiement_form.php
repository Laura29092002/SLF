<?php 
session_start();



include "./database.php";

//on récupère les informations que l'utilisateur a rentré pour payer
$type_Paiement= isset($_POST['type_Paiement']) ? $_POST['type_Paiement'] : "";
$numero_Carte = isset($_POST['numero_Carte']) ? $_POST['numero_Carte'] : "";
$nom = isset($_POST['nom']) ? $_POST['nom'] : "";
$date_Expiration_Carte = isset($_POST['date_Expiration_Carte']) ? $_POST['date_Expiration_Carte'] : "";
$Code_Securite = isset($_POST['Code_Securite']) ? $_POST['Code_Securite'] : "";

$erreur = "";

//on vérifie que tous les champs sont bien rénseignés
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


if (empty($erreur) && isset($_POST['valider'])) { //si la personne a bien cliqué sur valider
    //cette requète renvoie true ou false si les renseignement pour payer sont vrais ou fausses
    $sql = "SELECT * FROM paiement where type_Paiement='".$type_Paiement."' and numero_Carte='".$numero_Carte."' and nom='".$nom."' and date_Expiration_Carte='".$date_Expiration_Carte."' and code_Securite=".$Code_Securite;

    $reqp = $con->prepare($sql);
    
    $reqp->execute();

    $isInTable = $reqp->fetch();

    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paiement_form.css">
    <title>Tout parcourir</title>
</head>
<body>
    <header>
        <img src=".\images\logo.png" alt="logo" >
        <section class="top-page">
                    <nav class="nav">
                        <li><a class="button blanc" href="site.php">ACCUEIL</a></li>
                        <li><a class="button bleu" href="tout_parcourir.php">TOUT<br> PARCOURIR</a></li>
                        <li><a class="button blanc" href="page-Notifications.php">NOTIFICATIONS</a></li>
                        <li><a class="button blanc" href="panier1.php">PANIER</a></li>
                        <li><a class="button blanc" href="mon_compte.php"><?php if($_SESSION['is_logged_in'] == true){echo $_SESSION['prenom'];} 
                        else {
                            echo 'COMPTE';
                            }?> </a></li>
                    </nav>
        </section>    
        <div class="container">
            <img class="habillage" src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
    <?php 
    if($isInTable==false){ //si l'utilisateur a rentré des informations érronées
        echo "paiement non accepté";
    }
    else{ //sinon
        echo"paiement accepté";
        $role = $_SESSION['role'];
        // requète permettant de récupérer l'id de l'utilisateur (client, vendeur ou administrateur)
        $sql1 = "SELECT id_".$role." FROM ".$role." WHERE email ='".$_SESSION["email"]."'";

        $resq1 = $con->prepare($sql1);

        $resq1->execute();

        $id_utilisateur = $resq1->fetch();

        // requète permettant de récupérer tous les articles qui sont dans le panier de l'utilisateur qui a payé
        $sql2 = "SELECT id_Article FROM panier WHERE id_utilisateur = '".$id_utilisateur["id_".$role]."'";
        $resq2 = $con->prepare($sql2);
        $resq2->execute();
        $id_Articles = $resq2->fetchAll();

        foreach ($id_Articles as $id_Article) { //on supprime les articles vendus dans la table panier de l'acheteur mais aussi sur le site 
            $sql = "DELETE FROM panier WHERE id_Article ='" . $id_Article['id_Article'] . "'";
            $resq = $con->prepare($sql);
            $resq->execute();

            $sql2 = "DELETE FROM article WHERE id_Article ='" . $id_Article['id_Article'] . "'";
            $resq2 = $con->prepare($sql2);
            $resq2->execute();
        }

    }
    ?>
   
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