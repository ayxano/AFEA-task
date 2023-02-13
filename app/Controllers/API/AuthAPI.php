<?php
namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Validation\Exceptions\ValidationException;

class AuthAPI extends BaseController
{
    use ResponseTrait;
    public function __construct(
        private UserModel $model = new UserModel,
        private UserEntity $entity = new UserEntity
    ) {}
    public function login() : Response
    {
        try {
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
            $user = $this->model->where('email', $email)->first();
            if($user === null)
            {
                throw new \Exception('Email/Password not correct!');
            }
            if(password_verify($password, $user->getPassword()) === false)
            {
                throw new \Exception('Email/Password not correct!');
            }
            session()->set('user', $user);
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
            $this->entity
            ->setId(null)
            ->setFirstName($this->request->getVar('first_name'))
            ->setLastName($this->request->getVar('last_name'))
            ->setEmail($this->request->getVar('email'))
            ->setPassword(password_hash($this->request->getVar('password'), PASSWORD_DEFAULT));
            $this->model->save($this->entity);
            $this->entity->setId($this->model->getInsertID());
            session()->set('user', $this->entity);
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