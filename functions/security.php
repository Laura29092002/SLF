

<?php

require_once 'database.php';

/**
 * Est-ce que l'utilisateur est autorisé à se connecter au site ?
 */
function check_login(string $username, string $password, $con, $role): bool
{
    // Récupérer l'utilisateur avec le username "$username"
    $sql = 'SELECT * FROM '.$role.' WHERE email = "'.$username.'"';
    $query = $con->prepare($sql);
    $query->execute();

    $user = $query->fetch();

    if( ! is_array($user) ){
        return false;
    }

    $_SESSION['email'] = $username;
    $_SESSION['role'] = $role;
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['prenom'] = $user['prenom'];
    
    if($_SESSION['role'] == 'client'){
        $_SESSION['adresse'] = $user['adresse'];
        $_SESSION['notification'] = $user['notification'];
    }
    
    
    if ($password == $user['mdp']){
        $_SESSION['is_logged_in'] = True;
        
    }
    

    return $_SESSION['is_logged_in'];
}

/**
 * Est-ce que l'utilisateur est connecté ?
 */
function is_logged_in()
{
    if ( ! array_key_exists('is_logged_in', $_SESSION)) {
        return false;
    }

    return $_SESSION['is_logged_in'];
}

/**
 * Déconnecter l'utilisation
 */
function logout()
{
    if($_SESSION['role'] == 'client'){
        $_SESSION['adresse'] = null;
        $_SESSION['notification'] = null;
    }
    
    $_SESSION['is_logged_in'] = false;
    $_SESSION['role']         = null;
    $_SESSION['email'] = null;
    $_SESSION['nom'] = null;
    $_SESSION['prenom'] = null;
}
