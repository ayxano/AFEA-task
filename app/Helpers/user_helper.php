<?php
if(!function_exists('isLogged'))
{
    function isLogged() : bool
    {
        return isset(session('user')['id']);
    }
}