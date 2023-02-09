<?php
namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Validation\Exceptions\ValidationException;
use App\Models\PostsModel;

class PostAPI extends BaseController
{
    use ResponseTrait;
    public function addPost() : Response
    {
        try {
            $post = new PostsModel();
            $rules = [
                'title'                 => 'required|min_length[2]|max_length[50]',
                'content'               => 'required|min_length[2]',
                'tags'                  => 'required',
            ];
            if($this->validate($rules) === false)
            {
                throw new ValidationException();
            }
            $data = [
                'user_id'       => session('user')['id'],
                'title'         => $this->request->getVar('title'),
                'content'       => $this->request->getVar('content'),
                'tags'          => $this->request->getVar('tags'),
            ];
            $post->save($data);
            $postId = $post->getInsertID();
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