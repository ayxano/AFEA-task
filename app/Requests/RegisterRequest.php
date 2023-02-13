<?php
namespace App\Requests;

class RegisterRequest {
    /**
     * @return array
     */
    public static function rules() : array
    {
        return [
                'first_name'            => 'required|min_length[2]|max_length[50]',
                'last_name'             => 'required|min_length[2]|max_length[50]',
                'email'                 => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
                'password'              => 'required|min_length[4]|max_length[50]',
                'confirmpassword'       => 'matches[password]'
        ];
    }
}