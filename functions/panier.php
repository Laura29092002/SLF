<?php 
include "./database.php";
function supprimer(string $id, PDO $con, string $id_utilisateur){
    
    $sql = "DELETE FROM panier WHERE id_Article ='" . $id . "' AND id_utilisateur = '".$id_utilisateur."'";
    $resq = $con->prepare($sql);
    
    $resq->execute();
    
}

function ajouter(string $id_Article, PDO $con, string $id_utilisateur){
    $role = $_SESSION['role'];
    $sql1 = 'INSERT INTO panier(id_utilisateur, id_Article, '.$role.') VALUES ( '.$id_utilisateur.' , '.$id_Article.' , TRUE)';
        $reqp1 = $con->prepare($sql1);
        
        $reqp1->execute();
    
        
}


function existe_article($id_Article, $id_utilisateur, $con){
    $sql = "SELECT * FROM panier WHERE id_Article ='" . $id_Article . "' AND id_utilisateur = '".$id_utilisateur."' ";
    $resq = $con->prepare($sql);
    $resq->execute();
    return $resq;
}