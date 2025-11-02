<?php
    include "./database.php";
    session_start();

    $type = $_GET ['type']; //on récupère dans l'url le type de vêtement que l'utilisateur veut rechercher
    $requete_id_type = "SELECT id_Type_De_Vetement FROM type_de_vetement WHERE nom ='".$type."'";
    $prep_id_type = $con->prepare($requete_id_type);
    $prep_id_type->execute();
    $str_id_type = $prep_id_type->fetch();

    $categorie = $_GET['categorie']; //on récupère dans l'url la catégorie de vêtement que l'utilisateur veut rechercher
    $requete_categorie = "SELECT id_categorie FROM categorie WHERE nom ='".$categorie."'";
    $prep_categorie = $con->prepare($requete_categorie);
    $prep_categorie->execute();
    $str_categorie = $prep_categorie->fetch();

    // requete pour récupérer tous les article avec un type et une catégorie  
    $sql = "SELECT * FROM article WHERE id_Type_De_Vetement =".$str_id_type['id_Type_De_Vetement']."  AND id_Categorie =".$str_categorie['id_categorie']."";

    $resq = $con->prepare($sql);

    $resq->execute();

    $articles = $resq->fetchAll();

    



?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <title>Tout parcourir article</title>
        <link rel="stylesheet" href="article.css">
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
                        <li><a class="button blanc" href="mon_compte.php"><?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == True){echo $_SESSION['prenom'];} 
                        else {
                            echo 'COMPTE';
                            }?></a></li>
                    </nav>
        </section>    
        <div class="container">
            <img class="habillage" src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
    <section id="cart-container">
            <table width="100%">
            <thead>
                <tr>
                    <td>Photo</td>
                    <td>Nom</td>
                    <td>description</td>
                    <td>Prix</td>
                    <td>Acheter</td>
                </tr>
            </thead>
            <tbody>
            <?php 
            foreach($articles as $article) { //afficher tous les articles correspondant à un type et une catégorie 
            ?>
            <tr>
                
            <td><img class="image" src= <?php echo $article['photo']; ?>  alt='article' ></td>

            <td><h2> <?php echo $article['nom']; ?></h2></td>

            <td><p><?php echo $article['description']; ?></p> </td>
            <td><p><?php echo $article['prix_Initial']; ?> €</p></td>
            <td><a href= "panier1.php?id=<?php echo $article['id_Article']?>&action=ajouter"><button class="button" type="submit">Ajouter au panier</button></a></td> 
            </tr>
            
        <?php
            }
        ?>
        <br>
        
        </tbody>
        </table>
        </section>
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
