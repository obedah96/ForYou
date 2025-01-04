<?php 
namespace App\Application\UseCases\User;
use App\Domain\Entities\User as EloquentUser;
use App\Infrastructure\Repositories\Interfaces\UserRepositoryInterface;

class LogoutUser{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function logout(EloquentUser $user): void
{
    $this->userRepository->logout($user);
}

}