<?php
namespace App\Domain\Entities;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model{

    use HasApiTokens;
    protected $table = 'admins';
    protected $fillable = [
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
}