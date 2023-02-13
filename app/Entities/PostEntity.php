<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
class PostEntity extends Entity
{
    public function setId(int|null $id) : PostEntity
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    public function getId() : int | null
    {
        return $this->attributes['id'];
    }

    public function setUserId(int $id) : PostEntity
    {
        $this->attributes['user_id'] = $id;
        return $this;
    }

    public function getUserId() : int
    {
        return $this->attributes['user_id'];
    }

    public function setTitle(string $title) : PostEntity
    {
        $this->attributes['title'] = $title;
        return $this;
    }

    public function getTitle() : string
    {
        return $this->attributes['title'];
    }

    public function setContent(string $content) : PostEntity
    {
        $this->attributes['content'] = $content;
        return $this;
    }

    public function getContent() : string
    {
        return $this->attributes['content'];
    }

    public function setTags(string $tags) : PostEntity
    {
        $this->attributes['tags'] = $tags;
        return $this;
    }

    public function getTags() : string
    {
        return $this->attributes['tags'];
    }
}