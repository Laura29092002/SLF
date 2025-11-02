<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tout_parcourir.css">
    <title>Tout parcourir</title>
</head>
<body>
    <header>
        <img src=".\images\logo.png" alt="logo" >
        <section class="top-page">
                    <nav class="nav">
                        <li><a class="button blanc" href="site.php">ACCUEIL</a></li>
                        <li><a class="button bleu" href="tout_parcourir.php">TOUT<br> PARCOURIR</a></li>
                        <li><a <?php if(isset($_SESSION['notification']) && $_SESSION['notification'] != NULL){ echo 'class="button rouge"';    } else{  echo 'class = "button blanc"'; } ?> href="page-Notifications.php">NOTIFICATIONS</a></li>
                        <li><a class="button blanc" href="panier1.php">PANIER</a></li>
                        <li><a class="button blanc" href="mon_compte.php"><?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true){echo $_SESSION['prenom'];} 
                        else {
                            echo 'COMPTE';
                            }?> </a></li>
                    </nav>
        </section>    
        <div class="container">
            <img class="habillage" src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
    <h2 class="nav">ARTICLES RARES</h2>
    <ul class="gallery">
        <li>Haut été</li>
        <li>Haut hiver</li>
        <li>Robe</li>
        <li>Pantalon</li>
        <li>Jupe/Short</li>
    </ul>
    <ul class="gallery">
        <li><a href="./article.php?categorie=vetement_rare&type=haut_ete" ><img class="image" src=".\images\ar_haut_ete.png" alt="haut ete"></a></li>
        <li><a href="./article.php?categorie=vetement_rare&type=haut_hiver"><img class = "image" src=".\images\ar_haut_hiver.png" alt="haut hiver" ></a></li>
        <li><a href="./article.php?categorie=vetement_rare&type=robe"><img class = "image" src=".\images\ar_robe.png" alt="robe" ></a></li>
        <li><a href="./article.php?categorie=vetement_rare&type=pantalon"><img class = "image" src=".\images\ar_pantalon.png" alt="pantalon" ></a></li>
        <li><a href="./article.php?categorie=vetement_rare&type=jupe_short"><img class = "image" src=".\images\ar_jupe.png" alt="jupe" ></a></li>
        
    </ul>
    <h2 class="nav">ARTICLES HAUT DE GAMMES</h2>

    <ul class="gallery">
        <li>Haut été</li>
        <li>Haut hiver</li>
        <li>Robe</li>
        <li>Pantalon</li>
        <li>Jupe/Short</li>
    </ul>

    <ul class="gallery">
        <li><a href="./article.php?categorie=vetement_haut_de_gamme&type=haut_ete"><img class = "image" src=".\images\ahdg_haut_ete.png" alt="haut ete" ></a></li>
        <li><a href="./article.php?categorie=vetement_haut_de_gamme&type=haut_hiver"><img class = "image" src=".\images\ahdg_haut_hiver.png" alt="haut hiver" ></a></li>
        <li><a href="./article.php?categorie=vetement_haut_de_gamme&type=robe"><img class = "image" src=".\images\ahdg_robe.png" alt="robe" ></a></li>
        <li><a href="./article.php?categorie=vetement_haut_de_gamme&type=pantalon"><img class = "image" src=".\images\ahdg_pantalon.png" alt="pantalon" ></a></li>
        <li><a href="./article.php?categorie=vetement_haut_de_gamme&type=jupe_short"><img class = "image" src=".\images\ahdg_short.png" alt="short" ></a></li>
       
    </ul>
    <h2 class="nav">ARTICLES REGULIERS</h2>

    <ul class="gallery">
        <li>Haut été</li>
        <li>Haut hiver</li>
        <li>Robe</li>
        <li>Pantalon</li>
        <li>Jupe/Short</li>
    </ul>

    <ul class="gallery">
        <li><a href="./article.php?categorie=vetement_regulier&type=haut_ete"><img class = "image" src=".\images\are_haut_ete.png" alt="haut ete" ></a></li>
        <li><a href="./article.php?categorie=vetement_regulier&type=haut_hiver"><img class = "image" src=".\images\are_haut_hiver.png" alt="haut hiver" ></a></li>
        <li><a href="./article.php?categorie=vetement_regulier&type=robe"><img class = "image" src=".\images\are_robe.png" alt="robe" ></a></li>
        <li><a href="./article.php?categorie=vetement_regulier&type=pantalon"><img class = "image" src=".\images\are_pantalon.png" alt="pantalon" ></a></li>
        <li><a href="./article.php?categorie=vetement_regulier&type=jupe_short"><img class = "image" src=".\images\are_jupe.png" alt="jupe" ></a></li>
    </ul>
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