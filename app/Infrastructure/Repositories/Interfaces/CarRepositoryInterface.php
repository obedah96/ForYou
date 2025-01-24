<?php
namespace App\Infrastructure\Repositories\Interfaces;
//app\Infrastructure\Repositories\Interfaces\CarRepositoryInterface.php

interface CarRepositoryInterface
{
    public function getLatestThreeCars();
    public function getAllCars();
}
