<?php
namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Entity\Cast\JsonCast;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Validation\Exceptions\ValidationException;
use Exception;

class AuthAPI extends BaseController
{
    use ResponseTrait;
    public function login() : Response
    {
        try {
            $user = new UserModel();
            $rules = [
                'email'     =>  'required|valid_email',
                'password'  =>  'required'
            ];
            if($this->validate($rules) === false)
            {
                throw new ValidationException();
            }
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $data = $user->where('email', $email)->first();
            if($data === null)
            {
                throw new \Exception('Email not correct!');
            }
            if(password_verify($password, $data['pass']) === false)
            {
                throw new \Exception('Password not correct!');
            }
            session()->set('user', [
                'id' => $data['id'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'isLoggedIn' => TRUE
            ]);
            return $this->respond(['status' => 200, 'redirect' => url_to('PostsController::index')]);
        } catch (\Throwable $th) {
            if($th instanceof ValidationException)
            {
                return $this->failValidationErrors($this->validator->getErrors());
            }
            return $this->failUnauthorized($th->getMessage());
        }
    }

    public function register() : Response
    {
        try {
            $user = new UserModel();
            $rules = [
                'first_name'            => 'required|min_length[2]|max_length[50]',
                'last_name'             => 'required|min_length[2]|max_length[50]',
                'email'                 => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
                'password'              => 'required|min_length[4]|max_length[50]',
                'confirmpassword'       => 'matches[password]'
            ];
            if($this->validate($rules) === false)
            {
                throw new ValidationException();
            }
            $data = [
                'first_name'     => $this->request->getVar('first_name'),
                'last_name'     => $this->request->getVar('last_name'),
                'email'    => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $user->save($data);
            return $this->respond(['status' => 200, 'redirect' => url_to('PostsController::index')]);
        } catch (\Throwable $th) {
            if($th instanceof ValidationException)
            {
                return $this->failValidationErrors($this->validator->getErrors());
            }
            return $this->fail($th->getMessage());
        }
    }
}