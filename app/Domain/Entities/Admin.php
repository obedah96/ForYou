<?php
namespace App\Domain\Entities;

class Admin{
    public function __construct(
        public int $id,
        public string $email,
        public string $password
    ){}

    
}