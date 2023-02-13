<?php

use App\Entities\UserEntity;
if(!function_exists('isLogged'))
{
    function isLogged() : bool
    {
        return session('user') !== null;
    }
}


if(!function_exists('user'))
{
    function user() : UserEntity
    {
        return session('user');
    }
}