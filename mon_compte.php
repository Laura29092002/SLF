<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mon_compte.css">
    <title>Mon compte</title>
</head>
<body>
    <header>
        <img src=".\images\logo.png" alt="logo" >
        <section class="top-page">
                    <nav class="nav">
                        <li><a class="button blanc" href="site.php">ACCUEIL</a></li>
                        <li><a class="button blanc" href="tout_parcourir.php">TOUT<br> PARCOURIR</a></li>
                        <li><a <?php if(isset($_SESSION['notification']) && $_SESSION['notification'] != NULL){ echo 'class="button rouge"';    } else{  echo 'class = "button blanc"'; } ?> href="page-Notifications.php">NOTIFICATIONS</a></li>
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
    <?php if(!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] == false){ //si l'ulisateur n'est pas inscrit ou connecté

        echo '<nav class="droite">
        <img class="image" src=".\images\inscription.png" alt="inscription" >
        <h2>Nouvel Utilisateur?</h2>
        <ul class="compte">
            <li><a href=".\inscription.php"><button class="button" type="inscription">Inscription</button></a></li>
        </ul>
        <h2>Connexion</h2>
        <form action="connexion.php" method="POST">
            <ul class="compte">
                <li><label for="your-username">Identifiant</label></li>
                <li><input id="your-email" type="text" name="username"></li>
                <li><label for="your-password">Mot de passe</label></li>
                <li><input id="your-email" type="password" name="password"></li>
                <li><select id="your-email" name = "role">
                    <option value = "client" selected>client</option>
                    <option value = "vendeur">vendeur</option>
                    <option value = "administrateur">administrateur</option>
                    
                </select></li>
                <br>
                <li><button class="button" type="submit">Se connecter</button></li>
            </ul>
        
        </form>
    
        
    </nav>';

    }
    
    else if (isset($_SESSION['is_logged_in'])){ //si l'utilisateur est connecté
        ?>
        <div class="droite">
        <section id="cart-container">
            <table>
                <br>
            <thead>
                <tr>
                    <td>Role</td>
                    <td>Nom</td>
                    <td>Prenom</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $_SESSION['role'] ?></td>
                <td><?php echo $_SESSION['nom'] ?></td>
                <td><?php echo $_SESSION['prenom']?></td>
                <td><?php echo $_SESSION['email'] ?></td>
        
            </tr>
            
        
        
        </tbody>
        </table>
        </section>
        <br><a href="logout.php"><button class="button" type="deconnexion">Se deconnecter</button></a><br> 
        <?php if($_SESSION['role'] == 'vendeur' || $_SESSION['role'] == 'administrateur'){ //si  l'tilisateur est un vendeur ou un admisnistrateur il peut vendre des articles
            echo '<br><a href="vendre_un_article.php"><button class="button" type="ajouter">Vendre un article</button></a><br>';
        }
        
    }
    ?>
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