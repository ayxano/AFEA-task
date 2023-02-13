<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
class PostEntity extends Entity
{
    /**
     * @param int|null $id
     * 
     * @return PostEntity
     */
    public function setId(int|null $id) : PostEntity
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId() : int | null
    {
        return $this->attributes['id'];
    }

    /**
     * @param int $id
     * 
     * @return PostEntity
     */
    public function setUserId(int $id) : PostEntity
    {
        $this->attributes['user_id'] = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId() : int
    {
        return $this->attributes['user_id'];
    }

    /**
     * @param string $title
     * 
     * @return PostEntity
     */
    public function setTitle(string $title) : PostEntity
    {
        $this->attributes['title'] = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->attributes['title'];
    }

    /**
     * @param string $content
     * 
     * @return PostEntity
     */
    public function setContent(string $content) : PostEntity
    {
        $this->attributes['content'] = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->attributes['content'];
    }

    /**
     * @param string $tags
     * 
     * @return PostEntity
     */
    public function setTags(string $tags) : PostEntity
    {
        $this->attributes['tags'] = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getTags() : string
    {
        return $this->attributes['tags'];
    }
}