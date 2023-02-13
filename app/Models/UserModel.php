<?php 
namespace App\Models;

use App\Entities\UserEntity;
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'users';
    protected $returnType = UserEntity::class;
    
    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'pass',
        'created_at'
    ];

    /**
     * @param string $email
     * @param string $password
     * 
     * @return UserEntity
     */
    public function getUser(string $email, string $password) : UserEntity | null
    {
        $user = $this->where('email', $email)->first();
        if($user === null)
        {
            return null;
        }
        if(password_verify($password, $user->getPassword()) === false)
        {
            return null;
        }
        return $user;
    }
}