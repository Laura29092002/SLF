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
                        <li><a class="button bleu" href="mon_compte.php"><?php if($_SESSION['is_logged_in'] == True){echo $_SESSION['prenom'];} 
                        else {
                            echo 'COMPTE';
                            }?></a></li>
                    </nav>
        </section>    
        <div class="container">
            <img class="habillage" src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
        
        <form class="droite" id="monformulaire" action="traitement_form_2.php" method="POST">
        <?php
            echo "<h2>Vendre un article</h2>"; 
        ?>
            <table>
                <tr>
                    <td>Nom :</td>
                    <td>
                        <input id="your-email" type="text" name="nom" id="nom" />
                    </td>
                </tr>
                <tr>
                    <td>Photo :</td>
                    <td>
                        <input id="your-email" type="text" name="photo" id="photo" />
                    </td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td>
                        <input id="your-email" type="text" name="description" id="description" />
                    </td>
                </tr>
                <tr>
                    <td>Prix :</td>
                    <td>
                        <input id="your-email" type="int" name="prix" id="prix" />
                    </td>
                </tr>
                <tr>
                    <td>Categorie :</td>
                    <td>
                    <select id="your-email" name = "categorie">
                        <option value = "vetement_rare" selected>Vetement rare</option>
                        <option value = "vetement_haut_de_gamme">Vetement haut de gamme</option>
                        <option value = "vetement_regulier">Vetement regulier</option>
                        
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Type de vetement :</td>
                    <td>
                    <select id="your-email" name = "type">
                        <option value = "haut_ete" selected>Haut ete</option>
                        <option value = "haut_hiver">Haut hiver</option>
                        <option value = "robe">Robe</option>
                        <option value = "pantalon">Pantalon</option>
                        <option value = "jupe_short">Jupe ou Short</option>
                        
                    </select>
                    </td>
                </tr>
                <td colspan="2">
                    <input id="your-email" type="submit" name="valider" value="Valider" />
                </td>
                
                </tr>
            </table>
        </form>
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
            
            <nav class="nav-en-colonne">
                <h2 class="text-strong size-m couleur3">RECEVEZ NOTRE NEWSLETTER</h2>
                <form class="column" action="">
                    <input id="your-email" type="email">
                    <label for="your-email" class="text-gray">Entrez votre e-mail</label>
                     <button class="button" type="submit">OK</button>
            
                </form>

        
            </nav>

            <div class="container">
                <img src=".\images\logo.png"alt="logo de notre site" class="img2">
            </div>


        </section>
        

    </footer>
    </body>
</html>