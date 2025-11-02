<?php

require_once 'functions/security.php';
require_once 'functions/roles.php';

/**
 * Rediriger tous les utilisateur non admin vers la page de connexion.
 */
function is_admin_or_redirect_to_login()
{
    if ( ! is_admin()) {
        header('Location: login.php');
        exit;
    }
}

/**
 * Afficher une page d'erreur "Interdit" pour les utilisateur non admin.
 */
function is_admin_or_forbidden()
{
    if ( ! is_admin()) {
        header('HTTP/1.0 403 Forbidden');
        exit;
    }
    else{
        return;
    }
}

/**
 * Rediriger les utilisateur en fonction de leur rôle.
 */
function is_logged_in_redirect_to_page($role)
{
    if ( ! is_logged_in()) {
        return;
    }

    else if ($role == 'administrateur' ) {
       header('Location: mon_compte.php');
    }
    else if($role == 'vendeur'){
        header('Location: mon_compte.php');
    } 
    else {
        header('Location: index.php');
    }
    exit;
}

/**
 * Déconnecter et rediriger les utilisateur vers la page d'accueil.
 */
function logout_redirect_to_home()
{
    logout();

    header('Location: site.php');
    exit;
}
