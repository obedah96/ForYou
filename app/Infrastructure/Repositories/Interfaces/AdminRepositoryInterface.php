<?php
namespace App\Infrastructure\Repositories\Interfaces;

use App\Domain\Entities\Admin;
interface AdminRepositoryInterface{
    public function findByEmail(string $email):?Admin;
}