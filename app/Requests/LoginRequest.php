<?php
namespace App\Requests;

class LoginRequest {
    /**
     * @return array
     */
    public static function rules() : array
    {
        return [
            'email'                     =>  'required|valid_email',
            'password'                  =>  'required'
        ];
    }
}