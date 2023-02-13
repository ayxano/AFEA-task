<?php
namespace App\Controllers;

use App\Models\PostsModel;
use CodeIgniter\HTTP\Response;
use App\Exceptions\AccessDeniedException;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostsController extends BaseController
{
    public function __construct(
        private PostsModel $model = new PostsModel
    ) {}
    public function index() : Response
    {
        $userPosts = $this->model->getPostsByUserId(user()->getId());
        return $this->response->setBody(view('post/list', [
            'userPosts' => $userPosts
        ]));
    }

    public function getBlogPost(int $postId) : Response
    {
        $post = $this->model->getBlogPost($postId);
        if($post === null)
        {
            throw new PageNotFoundException('Post not found!');
        }
        if($post->getUserId() !== user()->getId())
        {
            throw new AccessDeniedException('Access denied!');
        }
        return $this->response->setBody(view('post/detail', [
            'post' => $post
        ]));
    }

    public function addPost() : Response
    {
        return $this->response->setBody(view('post/add'));
    }
}