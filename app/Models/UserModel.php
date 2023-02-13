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
}