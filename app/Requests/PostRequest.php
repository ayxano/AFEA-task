<?php
namespace App\Requests;

class PostRequest {
    /**
     * @return array
     */
    public static function rules() : array
    {
        return [
            'title' => 'required|min_length[2]|max_length[50]',
            'content'   => 'required|min_length[2]',
            'tags'  => 'required',
        ];
    }
}