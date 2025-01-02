<?php
//app\Infrastructure\Repositories\Interfaces\UserRepositoryInterface.php
namespace App\Infrastructure\Repositories\Interfaces;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function save(User $user): User;
    public function findByEmail(string $email): ?User;

    public function LoginUser($identifier,$password): ?User;
    
    public function findByVerificationToken(string $token):  ?User;

    public function markEmailAsVerified(User $user);
}
