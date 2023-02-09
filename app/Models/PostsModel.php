<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = 'posts';
    protected $allowedFields = [
        'user_id',
        'title',
        'content',
        'tags'
    ];

    public function getPostsByUserId(int $userId)
    {
        return $this->where(['user_id' => $userId])->first();
    }
}