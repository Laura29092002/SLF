<?php

/**
 * Est-ce que l'utilisateur a certains privilèges ?
 */
function current_user_can(string $role): bool
{
    return $_SESSION['role'] == $role;
}

/**
 * Est-ce que l'utilisateur a le rôle "adminatrator"
 */
function is_admin(): bool
{
    return current_user_can('administrator');
}

/**
 * Est-ce que l'utilisateur a le rôle "editeur"
 */
function is_editor(): bool
{
    return current_user_can('editor') || is_admin();
}
