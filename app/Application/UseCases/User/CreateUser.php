<?php
// app/Application/UseCases/User/CreateUser.php
namespace App\Application\UseCases\User;

use App\Domain\Entities\User as EloquentUser;
use App\Infrastructure\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\EmailService; 
use Illuminate\Support\Str;

class CreateUser
{
    private UserRepositoryInterface $userRepository;
    private EmailService $emailService; 

    public function __construct(UserRepositoryInterface $userRepository, EmailService $emailService)
    {
        $this->userRepository = $userRepository;
        $this->emailService = $emailService; 
    }

    public function execute(array $data): EloquentUser
    {
        
        $user = new EloquentUser();
        $user->fill([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phoneNumber' => $data['phoneNumber'],
            'city' => $data['city'],
            'region' => $data['region'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'verification_token' => Str::random(64) 
        ]);

       
        $savedUser = $this->userRepository->save($user);

        
        $verificationUrl = url('/api/verify-email/' . $savedUser->verification_token);

        $this->emailService->sendVerificationEmail($savedUser, $verificationUrl);

        return $savedUser;
    }
}
