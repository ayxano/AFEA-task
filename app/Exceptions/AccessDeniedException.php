<?php
namespace App\Exceptions;

use CodeIgniter\Exceptions\HTTPExceptionInterface;

class AccessDeniedException extends \Exception implements HTTPExceptionInterface
{
    protected $code = 403;
}