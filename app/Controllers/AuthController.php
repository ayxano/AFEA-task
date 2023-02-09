<?php
namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;

class AuthController extends BaseController
{
    public function login() : Response
    {
        return $this->response->setBody(view('auth/login'));
    }

    public function register() : Response
    {
        return $this->response->setBody(view('auth/register'));
    }

    public function logout() : Response
    {
        session()->destroy();
        return $this->response->redirect('/');
    }
}