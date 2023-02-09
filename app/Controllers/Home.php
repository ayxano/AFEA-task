<?php
namespace App\Controllers;

use App\Models\PostsModel;
use CodeIgniter\HTTP\Response;

class Home extends BaseController
{
    public function index() : Response
    {
        $posts = new PostsModel();
        $postsCount = $posts->countAllResults();
        return $this->response->setBody(view('homepage', [
            'postsCount' => $postsCount
        ]));
    }
}
