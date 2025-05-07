<?php
// app/Infrastructure/Repositories/Eloquent/AdminRepository.php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Infrastructure\Repositories\Interfaces\AdminRepositoryInterface;
use App\Domain\Entities\Admin;

class AdminRepository implements AdminRepositoryInterface
{
    public function findByEmail(string $email): ?Admin
    {
        return Admin::where('email', $email)->first();
    }
}
