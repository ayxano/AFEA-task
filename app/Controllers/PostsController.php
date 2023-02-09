<?php
namespace App\Controllers;

use App\Models\PostsModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Response;

class PostsController extends BaseController
{
    public function index() : Response
    {
        $posts = new PostsModel();
        $userId = session('user')['id'];
        $userPosts = $posts->where('user_id', $userId)->findAll();
        return $this->response->setBody(view('posts', [
            'userPosts' => $userPosts
        ]));
    }

    public function getBlogPost(int $postId) : Response
    {
        $post = new PostsModel();
        $userId = session('user')['id'];
        $userPost = $post
            ->where('user_id', $userId)
            ->where('id', $postId)
            ->first();
        if($userPost === null)
        {
            throw new PageNotFoundException('Post not found!');
        }
        return $this->response->setBody(view('post_detail', [
            'post' => $userPost
        ]));
    }

    public function addPost() : Response
    {
        return $this->response->setBody(view('post_add'));
    }
}