<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="stylesite.css">
</head>
<body>
    <header>
    <img src=".\images\logo.png"alt="logo de notre site">
        <section class="top-page">
                    <nav class="nav">
                        <li><a class="button bleu" href="site.php">ACCUEIL</a></li>
                        <li><a class="button blanc" href="tout_parcourir.php">TOUT<br> PARCOURIR</a></li>
                        <li><a <?php if(isset($_SESSION['notification']) && $_SESSION['notification'] != NULL){ echo 'class="button rouge"';    } else{  echo 'class = "button blanc"'; } ?> href="page-Notifications.php">NOTIFICATIONS</a></li>
                        <li><a class="button blanc" href="panier1.php">PANIER</a></li>
                        <li><a class="button blanc" href="mon_compte.php"><?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == True){echo $_SESSION['prenom'];} 
                        else {
                            echo 'COMPTE';
                            }?></a></li>
                    </nav>
        </section>    
        <div class="container">
        <img src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
   
    <main>
        
        
        <div class="grid columns carousel hauteur3 centre">
            <div class="column">
                <h2 class="text-strong size-m blanc2 droite">Sélection du jour</h2>
                
                <div class="carousel__item carousel__item--visible">
                    <img src="./images/home.png">
                </div>
                <div class="carousel__item">
                    <img src="./images/home2.png">
                </div>
                <div class="carousel__item">
                    <img src="./images/home3.png" />
                </div>
                <div class="carousel__actions">
                    <button id="carousel__button--prev" aria-label="Previous slide"></button>
                    <button id="carousel__button--next" aria-label="Next slide"></button>
                </div>
            </div>

        
            <div class="column hauteur droite2">
                <h2 class="text-strong size-m blanc2 ">Un petit mot sur nous ...</h2>
                <p>Crée par Sorenza, Laura et Francesca,<br> SLF Friperie c’est avant tout une boutique-friperie en ligne <br> qui a pour objectif de rendre plus accessible la mode à ses clients <br> et qui s’engage à respecter des valeurs modernes de tolérance,<br> d’écoresponsabilité et d’éthique. 
                </p>
            </div>

        
            
        </div>

        <section class="background-beige">
            <div class="columns ">
                <hr>
                <div class="column">
                    
                    <h2 class="couleur3">LIVRAISON OFFERTE</h2>
                    <p>Livraison offerte dès 50€ en France Métropolitaine et dans les DOM-TOM</p>
                </div>
    
    
                <div class="column">
                    <h2 class="couleur3">RETOURS GRATUITS</h2>
                    <p>En France métropolitaine et dans les DOM-TOM</p>
                </div>
    
                <div class="column">
                    <h2 class="couleur3">PAIEMENT SECURISE</h2>
                    <p>Visa, Mastercard, Amex, Paypal, Maestro, Sofort, iDEAL</p>
                </div>
            </div>
        </section>
        <section class="back-groundvert"></section>

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
            
            <nav class="nav-en-colonne">
                <h2 class="text-strong size-m couleur3">RECEVEZ NOTRE NEWSLETTER</h2>
                <div class="column">
                    <input id="email" type="email" name="email">
                    <label for="email" class="text-gray">Entrez votre e-mail</label>

                     <button data-popup="#popup-1" class="popup-button menu-button" type="submit">OK</button>
                    <div id="popup-1" class="popup">
                        <p>Bonjour, nous avons bien enregistré votre adresse mail, vous allez désormais recevoir notre newsletter </p>
                        <button class="popup-close">Fermer</button>
                    </div>
                </div>
            

            </nav>
   

            <div class="container">
                <img src="./images/logo.png"alt="logo de notre site" class="img2">
            </div>


        </section>
        

    </footer>  
    
    <script src="app.js"></script>


</body>

</html>

