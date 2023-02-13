<?php
namespace App\Controllers;

use App\Models\PostsModel;
use CodeIgniter\HTTP\Response;

class Home extends BaseController
{
    public function __construct(
        private PostsModel $model = new PostsModel
    ) {}
    public function index() : Response
    {
        $postsCount = $this->model->countAllResults();
        return $this->response->setBody(view('homepage', [
            'postsCount' => $postsCount
        ]));
    }
}
