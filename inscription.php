<?php 
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <title>Formulaire PHP</title>
        <link rel="stylesheet" href="inscription.css">
    </head>
    <body>
    <header>
        <img src=".\images\logo.png" alt="logo" >
        <section class="top-page">
                    <nav class="nav">
                        <li><a class="button blanc" href="site.php">ACCUEIL</a></li>
                        <li><a class="button blanc" href="tout_parcourir.php">TOUT<br> PARCOURIR</a></li>
                        <li><a class="button blanc" href="page-Notifications.php">NOTIFICATIONS</a></li>
                        <li><a class="button blanc" href="panier1.php">PANIER</a></li>
                        <li><a class="button bleu" href="mon_compte.php"><?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == True){echo $_SESSION['prenom'];} 
                        else {
                            echo 'COMPTE';
                            }?></a></li>
                    </nav>
        </section>    
        <div class="container">
            <img class="habillage" src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
        <div class="gauche droite">
        <form  id="monformulaire" action="traitement_form.php" method="POST">
        <?php
            echo "<h2 class='gauche'>Inscription</h2>"; 
        ?>
            <table>
                <tr>
                    <td>Nom :</td>
                    <td>
                        <input id="your-email" type="text" name="nom" id="nom" />
                    </td>
                </tr>
                <tr>
                    <td>Prénom :</td>
                    <td>
                        <input id="your-email" type="text" name="prenom" id="prenom" />
                    </td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td>
                        <input id="your-email" type="text" name="email" id="email" />
                    </td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td>
                        <input id="your-email" type="password" name="password" id="password" />
                    </td>
                </tr>
                <tr>
                    <td>Mode de paiement:</td>
                    <td>
                       
                        <nav class="paiement" name="type_Paiement">
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
                        <input id="your-email" type="text" name="numero_Carte" id="numero_Carte" />
                    </td>
                </tr>
                <tr>
                    <td>nom:</td>
                    <td>
                        <input id="your-email" type="text" name="nom" id="nom" />
                    </td>
                </tr>
                <tr>
                    <td>Date d'expiration:</td>
                    <td>
                        <input id="your-email" type="date" name="date_Expiration_Carte" id="date_Expiration_Carte" />
                    </td>
                </tr>
                <tr>
                    <td>Code de securite:</td>
                    <td>
                        <input id="your-email" type="text" name="Code_Securite" id="Code_Securite" />
                    </td>
                </tr>
                <tr>
                    <td>Type de compte :</td>
                    <td>
                    <select id="your-email" name = "role">
                        <option value = "client" selected>client</option>
                        <option value = "vendeur">vendeur</option>
                        
                    </select>
                    </td>
                </tr>
                <td colspan="2">
                    <input id="your-email" type="submit" name="valider" value="Valider" />
                </td>
                
                </tr>
            </table>
        </form>
 </div>
        <br>
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

