<?php
//app\Domain\Entities\User.php
namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class User extends Model
{
    use HasApiTokens;
    protected $fillable = ['firstName','lastName', 'email', 'password','phoneNumber','verification_token','city','region','gender'];

    protected $hidden = ['password', 'remember_token'];

    
    public $timestamps = true;

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
