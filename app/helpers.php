<?php

use \Illuminate\Support\Facades\Cache;

/**
 * Get roles
 *
 * @return array<string, int> Roles titles and ids
 */
function user_roles() : array | null
{
    return Cache::get('roles');
}

/**
 * Determine if user is admin
 *
 * @return bool True if user is admin, otherwise false
 */
function is_admin() : bool
{
    $roles = user_roles();

    $roleId     = $roles['admin'];
    $userRoleId = auth()->user()->role_id;

    if($roleId !== $userRoleId)
        return false;

    return true;
}
