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
    <link rel="stylesheet" href="payer.css">
</head>
<body>
    <header>
        <img src="./images/logo.png"alt="logo de notre site"> 
        <section class="top-page">
                    <nav class="nav">
                        <li><a class="button bleu" href="site.php">ACCUEIL</a></li>
                        <li><a class="button blanc" href="tout_parcourir.php">TOUT<br> PARCOURIR</a></li>
                        <li><a class="button blanc" href="page-Notifications.php">NOTIFICATIONS</a></li>
                        <li><a class="button blanc" href="panier1.php">PANIER</a></li>
                        <li><a class="button blanc" href="mon_compte.html"><?php if($_SESSION['is_logged_in'] == true){echo $_SESSION['prenom'];} 
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
    <div class="gauche droite">
    <form  id="monformulaire" action="paiement_form.php" method="POST">
        
        <?php

            echo "<h2 class='gauche'>Payer</h2>"; 
        ?>
            <table>
                <tr>
                    <td>Mode de paiement:</td>
                    <td>
                       
                        <nav class="paiement">
                            <li><input TYPE=CHECKBOX UNCHECKED name="type_Paiement" id="Checkbox1" value="maestro" type="CHECKBOX"><img class="petit" src="./images/maestro.png"></li>
                            <li><input TYPE=CHECKBOX UNCHECKED name="type_Paiement" id="Checkbox1" value="visa" type="CHECKBOX"><img class="petit" src="./images/visa.png"></li>
                            <li><input TYPE=CHECKBOX UNCHECKED name="type_Paiement" id="Checkbox1" value="amex" type="CHECKBOX"><img class="petit" src="./images/AMEX.png"></li>
                            <li><input TYPE=CHECKBOX UNCHECKED name="type_Paiement" id="Checkbox1" value="paypal" type="CHECKBOX"><img class="petit" src="./images/paypal.png"></li>
                            <li><input TYPE=CHECKBOX UNCHECKED name="type_Paiement" id="Checkbox1" value="ideal" type="CHECKBOX"><img class="petit" src="./images/ideal.png"></li>
                            <li><input TYPE=CHECKBOX UNCHECKED name="type_Paiement" id="Checkbox1" value="mastercard" type="CHECKBOX"><img class="petit" src="./images/mastercard.png"></li>
                        </nav>    
                    </td>
                </tr>
                <tr>
                    <td>Numéro de carte:</td>
                    <td>
                        <input id="rond" type="text" name="numero_Carte" id="numero_Carte" />
                    </td>
                </tr>
                <tr>
                    <td>nom:</td>
                    <td>
                        <input id="rond" type="text" name="nom" id="nom" />
                    </td>
                </tr>
                <tr>
                    <td>Date d'expiration:</td>
                    <td>
                        <input id="rond" type="date" name="date_Expiration_Carte" id="date_Expiration_Carte" />
                    </td>
                </tr>
                <tr>
                    <td>Code de securite:</td>
                    <td>
                        <input id="rond" type="text" name="Code_Securite" id="Code_Securite" />
                    </td>
                </tr>
                <tr>
                    <td>Type de compte:</td>
                    <td>
                    <select id="your-email" name = "role">
                        <option value = "client" selected>client</option>
                        <option value = "vendeur">vendeur</option>
                        
                    </select>
                    </td>
                </tr>
                <td colspan="2">
                    <input id="rond" type="submit" name="valider" value="Valider" />
                </td>
                
                </tr>
            </table>
        </form>
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
    
    <script src="app.js"></script>


</body>

</html>
