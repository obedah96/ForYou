<?php 

namespace App\Application\UseCases\User;
use Illuminate\Support\Facades\Crypt;

use App\Infrastructure\Repositories\Interfaces\UserRepositoryInterface;
use App\Domain\Entities\User as EloquentUser;

class GetUserInformation
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(EloquentUser $user): array
    {
        $freshUser = $this->userRepository->findById($user->id);

        if (!$freshUser) {
            throw new \Exception('User not found');
        }

        return [
            'firstName' => $freshUser->firstName,
            'lastName' => $freshUser->lastName,
            'email' => $freshUser->email,
            'phoneNumber' => $freshUser->phoneNumber,
            'city' => $freshUser->city,
            'region' => $freshUser->region,
            'gender' => $freshUser->gender,
            'age' => $freshUser->age,
            'createdAt' => $freshUser->created_at->toDateTimeString(),
        ];
    }

}

