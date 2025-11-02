
<?php
session_start();

require_once 'functions/security.php';
require_once 'functions/redirects.php';

$role = $_POST['role'];

is_logged_in_redirect_to_page($role);

$errors = [];
if( isset($_POST['username']) && isset($_POST['password']) ) {
    $username = $_POST['username']; 
    $password = $_POST['password'];
    

    if( check_login($username, $password, $con, $role) ) {
        header('Location: mon_compte.php'); // si l'utilisateur a rentré le bon email et le bon mot de passe
    } else {
        $errors[] = 'Wrong username or password.'; //sinon
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <title>Validation inscription</title>
        <link rel="stylesheet" href="traitement_form.css">
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
                        <li><a class="button bleu" href="mon_compte.php">COMPTE</a></li>
                    </nav>
        </section>    
        <div class="container">
            <img class="habillage" src=".\images\vague_dans_header.png"alt="habillage">
        </div>

    </header>
        <p>Adresse mail ou mot de passe incorrects</p>
        <a href="./mon_compte.php"><button class="button" type="submit">OK</button>
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