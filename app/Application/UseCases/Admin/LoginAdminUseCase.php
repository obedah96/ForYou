<?php
namespace App\Application\UseCases\Admin;
use App\Infrastructure\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LoginAdminUseCase{

    public function __construct(protected AdminRepositoryInterface $repository){}

    public function execute(string $email , string $password) :?string {
        
        $admin=$this->repository->findByEmail($email);

        if(!$admin || !Hash::check($password,$admin->password))
            return null;

        return $admin->createToken('admin-login')->plainTextToken;  
    }
}