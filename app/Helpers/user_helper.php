<?php
if(!function_exists('isLogged'))
{
    function isLogged() : bool
    {
        return isset(session('user')['id']);
    }
}


if(!function_exists('user'))
{
    function user() : array
    {
        return session('user') ?? null;
    }
}