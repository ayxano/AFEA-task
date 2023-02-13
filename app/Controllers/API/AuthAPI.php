<?php
namespace App\Controllers\API;

use App\Models\UserModel;
use App\Entities\UserEntity;
use App\Requests\LoginRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Requests\RegisterRequest;
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
            if($this->validate(LoginRequest::rules()) === false)
            {
                throw new ValidationException();
            }
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $user = $this->model->getUser($email, $password);
            if($user === null)
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
            if($this->validate(RegisterRequest::rules()) === false)
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