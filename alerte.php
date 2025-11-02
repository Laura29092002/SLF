<?php

session_start();

include "./database.php";


$email= $_SESSION['email'];
$role = $_SESSION['role'];

//requète qui permet de recupérer l'id de l'utilisateur (client, vendeur ou administrateur)
$sqlemail="SELECT id_".$role." FROM ".$role."  where email='".$email."'";

$reqemail = $con->prepare($sqlemail);

$reqemail->execute();

$id_role=$reqemail->fetch();


//on recupère les informations de notification de l'utilisateur
$rare=isset($_POST['vetement_rare'])? $_POST['vetement_rare'] : "";
$haut_de_gamme=isset($_POST['vetement_haut_de_gamme'])? $_POST['vetement_haut_de_gamme'] : "";
$regulier=isset($_POST['vetement_regulier'])? $_POST['vetement_regulier'] : "";


//on recupère les ids des différentes catégories
$sqlrare="SELECT id_categorie FROM categorie  where nom='vetement_rare'";
$sqlhaut_de_gamme = "SELECT id_categorie FROM categorie  where nom='vetement_haut_de_gamme'";
$sqlregulier="SELECT id_categorie FROM categorie  where nom='vetement_regulier'";

$reqrare = $con->prepare($sqlrare);
$reqhaut_de_gamme = $con->prepare($sqlhaut_de_gamme);
$reqregulier = $con->prepare($sqlregulier);

$reqrare->execute();
$reqhaut_de_gamme->execute();
$reqregulier->execute();

$id_rare = $reqrare-> fetch();
$id_haut_de_gamme = $reqhaut_de_gamme-> fetch();
$id_regulier = $reqregulier->fetch();


if($rare=='yes'){ //si l'utilisateur veut être alerter si un article rare arrive sur le site
    $sql= "INSERT INTO notification (id_Categorie, id_utilisateur, {$role} ) VALUES(:idcategorie, :idutilisateur, TRUE)";
    $reqnotifrare=$con->prepare($sql);
    $reqnotifrare->bindValue(":idcategorie", $id_rare['id_categorie']);
    $reqnotifrare->bindValue(":idutilisateur", $id_role['id_'.$role]);
    $reqnotifrare->execute();
}


if($haut_de_gamme=='yes'){ //si l'utilisateur veut être alerter si un article haut de gamme arrive sur le site
    $sql= "INSERT INTO notification (id_Categorie, id_utilisateur, {$role} ) VALUES(:idcategorie, :idutilisateur, TRUE)";
    $reqnotifhautdegamme=$con->prepare($sql);
    $reqnotifhautdegamme->bindValue(":idcategorie", $id_haut_de_gamme['id_categorie']);
    $reqnotifhautdegamme->bindValue(":idutilisateur", $id_role['id_'.$role]);
    $reqnotifhautdegamme->execute();
}


if($regulier=='yes'){ //si l'utilisateur veut être alerter si un article régulier arrive sur le site
    $sql= "INSERT INTO notification (id_Categorie, id_utilisateur, {$role} ) VALUES(:idcategorie, :idutilisateur, TRUE)";
    $reqnotifregulier=$con->prepare($sql);
    $reqnotifregulier->bindValue(":idcategorie", $id_haut_de_gamme['id_categorie']);
    $reqnotifregulier->bindValue(":idutilisateur", $id_role['id_'.$role]);
    $reqnotifregulier->execute();
}

header('Location: page-Notifications.php'); //redirection vers la page notification

?>
