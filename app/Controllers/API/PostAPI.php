<?php
namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Entities\PostEntity;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Validation\Exceptions\ValidationException;
use App\Models\PostsModel;

class PostAPI extends BaseController
{
    use ResponseTrait;
    public function __construct(
        private PostsModel $model = new PostsModel,
        private PostEntity $entity = new PostEntity
    ) {}
    public function addPost() : Response
    {
        try {
            $rules = [
                'title'                 => 'required|min_length[2]|max_length[50]',
                'content'               => 'required|min_length[2]',
                'tags'                  => 'required',
            ];
            if($this->validate($rules) === false)
            {
                throw new ValidationException();
            }
            $this->entity
            ->setId(null)
            ->setUserId(user()['id'])
            ->setTitle($this->request->getVar('title'))
            ->setContent($this->request->getVar('content'))
            ->setTags($this->request->getVar('tags'));
            $this->model->save($this->entity);
            $postId = $this->model->getInsertID();
            return $this->respond(['status' => 200, 'redirect' => url_to('PostsController::getBlogPost', $postId)]);
        } catch (\Throwable $th) {
            if($th instanceof ValidationException)
            {
                return $this->failValidationErrors($this->validator->getErrors());
            }
            return $this->fail($th->getMessage());
        }
    }
}