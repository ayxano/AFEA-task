<?php
namespace App\Controllers;

use App\Models\PostsModel;
use CodeIgniter\HTTP\Response;
use App\Exceptions\AccessDeniedException;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostsController extends BaseController
{
    public function __construct(private PostsModel $postModel = new PostsModel())
    {
    }
    public function index() : Response
    {
        $userId = user()['id'];
        $userPosts = $this->postModel->getPostsByUserId($userId);
        return $this->response->setBody(view('posts', [
            'userPosts' => $userPosts
        ]));
    }

    public function getBlogPost(int $postId) : Response
    {
        $userId = user()['id'];
        $userPost = $this->postModel->getBlogPost($postId);
        if($userPost === null)
        {
            throw new PageNotFoundException('Post not found!');
        }
        if($userPost['user_id'] !== $userId)
        {
            throw new AccessDeniedException('Access denied!');
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