<?php
    include "./database.php";
    include "./functions/panier.php";
    session_start();
    $sous_Total = 0; 

    if(isset($_SESSION['email'])){ // si un utilisateur est connecté
    $role = $_SESSION['role'];
    $sql1 = "SELECT id_".$role." FROM ".$role." WHERE email ='".$_SESSION["email"]."'";

    $resq1 = $con->prepare($sql1);

    $resq1->execute();

    $id_utilisateur = $resq1->fetch(); //on récupère l'id de l'utilisateur (client, vendeur ou administrateur)

    

    if (isset($_GET['id'])) {
        $id_article = $_GET ['id'];
        $action = $_GET['action'];
        
    
        if($action == 'ajouter'){ //fonction qui permet d'ajouter un article dans le panier
            ajouter($id_article, $con, $id_utilisateur['id_'.$role]);
        }
        else if($action == 'supprimer'){ //fonction qui permet de supprimer un article dans le panier
            supprimer($id_article, $con, $id_utilisateur['id_'.$role]);
        }
        
        
    }
        
        $sql2 = "SELECT id_Article FROM panier WHERE id_utilisateur = '".$id_utilisateur["id_".$role]."' AND ".$role ."= TRUE";
        $resq2 = $con->prepare($sql2);
        $resq2->execute();
        $id_Articles = $resq2->fetchAll();
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
    <link rel="stylesheet" href="panier.css">
</head>
<body>
    <header>
    <img src=".\images\logo.png" alt="logo" >
        <section class="top-page">
                    <nav class="nav">
                        <li><a class="button blanc" href="site.php">ACCUEIL</a></li>
                        <li><a class="button blanc" href="tout_parcourir.php">TOUT<br> PARCOURIR</a></li>
                        <li><a <?php if(isset($_SESSION['notification']) && $_SESSION['notification'] != NULL){ echo 'class="button rouge"';    } else{  echo 'class = "button blanc"'; } ?> href="page-Notifications.php">NOTIFICATIONS</a></li>
                        <li><a class="button bleu" href="panier1.php">PANIER</a></li>
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

        <section id="textpanier">
            <h2>Panier</h2>
            <hr>
        </section>
        <?php
            if(isset($_SESSION['email'])){ // si un utilisateur est connecté
        ?>
        <section id="cart-container">
            <table width="100%">
            <thead>
                <tr>
                    <td>Supprimer</td>
                    <td>Image</td>
                    <td>Article</td>
                    <td>Prix</td>
                </tr>
            </thead>

            <tbody>
            <?php
            if ($id_Articles != false) { //si il y a des articles dans le panier
                foreach ($id_Articles as $id_Article) { //afficher tous les articles dans le panier
                    $sql = "SELECT * FROM article WHERE id_Article ='" . $id_Article['id_Article'] . "'";
                    $resq = $con->prepare($sql);
                    $resq->execute();
                    $article = $resq->fetch();
            ?>
                <tr>
                    <td><a href="./panier1.php?id=<?php echo $article['id_Article'] ?>&action=supprimer"><img src="./images/poubelle.png" alt="logo poubelle" class="img3"></a></td>
                    <td><img src=<?php echo $article['photo']; ?> ></td>
                    <td>
                        <h5> <?php echo $article['nom']; ?>
                        </h5>
                    </td>
                    <td><h5><?php echo $article['prix_Initial']; ?> €</h5></td>
                </tr>
            <?php
                    $sous_Total += $article['prix_Initial'];
                }
            }?>
                
            </tbody>
        </table>
        </section>
        <?php } 
        else{ //si l'utilisateur n'est pas connecté 
            echo "Veuillez vous connecter pour acceder à votre panier";
        }
        ?>


        <section id="cart-bottom" class="container">
            <div class="row">
                <div class="total colum cart">
                <div>
                <h5>TOTAL</h5>
                <div class="d-flex justify-content-between">
                    <h6>Sous-Total</h6>
                    <p> <?php echo $sous_Total;?>
                    </p>
                    <div class="d-flex justify-content-between">
                        <h6>Frais de livraison</h6>
                        <?php if( $sous_Total != 0 && $sous_Total < 50){ //calcule des frais de livraison d'un montant de 1 euro si le sous-total est en dessous de 50 euros
                            $frais = 1;
                            echo '1€';
                        
                        }
                        else{
                            $frais = 0;
                            echo '0€';
                        
                        }
                        ?>
                        
                </div>
                <hr class="second-hr">
                <div class="d-flex justify-content-between">
                    <h6>Total</h6>
                    <p> <?php echo $sous_Total + $frais; ?> 
                    </p>
                </div>
                <form action="payer.php">
                <button class="ml-auto">PAYER</button>
                    </form>


            </div>
        </div>
    </div>
        </section>







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
            <img src=".\images\logo.png" alt="logo" class="img2">
            </div>


        </section>


    </footer>

    <script src="panier1.php"></script>

</body>


</html>
