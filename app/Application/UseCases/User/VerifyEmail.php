<?php

namespace App\Application\UseCases\User;

use App\Infrastructure\Repositories\Interfaces\UserRepositoryInterface;

class VerifyEmail
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $token): string
    {
        $user = $this->userRepository->findByVerificationToken($token);

        if (!$user) {
            throw new \Exception('Invalid verification token.');
        }

        $this->userRepository->markEmailAsVerified($user);

        return 'Email successfully verified!';
    }
}
