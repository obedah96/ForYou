<?php
namespace App\Application\UseCases\Admin;
use App\Infrastructure\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LoginAdminUseCase{

    public function __construct(protected AdminRepositoryInterface $repository){}

    public function execute(string $email , string $password) :string|false {
        
        $admin=$this->repository->findByEmail($email);

        if(!$admin || Hash::check($password,$admin->password))
            return false;

        return "admin loggined successfully";    
    }
}