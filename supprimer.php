<?php  //page pour supprimer une notification une fois qu'elle est lue par l'utilisateur 
include "./database.php";
session_start();
$email= $_SESSION['email'];
$sqlemail="SELECT id_client FROM client  where email='{$email}'";

$reqemail = $con->prepare($sqlemail);

$reqemail->execute();

$id_Client=$reqemail->fetch();

$sql = " UPDATE client SET notification = null WHERE id_client = ".$id_Client['id_client'];

$reqp = $con->prepare($sql);

$reqp->execute();

$_SESSION['notification'] = null;
header('Location: tout_parcourir.php');


?>