<?php
//app\Application\UseCases\LoginUser.php
namespace App\Application\UseCases\User;

use App\Domain\Entities\User as EloquentUser;
use App\Infrastructure\Repositories\Interfaces\UserRepositoryInterface;

class LoginUser
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(array $data): ?EloquentUser
    {
        
        $user = $this->userRepository->LoginUser($data['email'], $data['password']);
    
        if (!$user) {
            throw new \Exception('Invalid credentials');
        }
    
        return $user;
    }
}
