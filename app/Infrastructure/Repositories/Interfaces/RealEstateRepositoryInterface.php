<?php
// App\Infrastructure\Repositories\Interfaces\RealEstateRepositoryInterface.php
namespace App\Infrastructure\Repositories\Interfaces;

interface RealEstateRepositoryInterface
{
    public function getLatestRealEstates();
    public function getAllRealEstates();
}
