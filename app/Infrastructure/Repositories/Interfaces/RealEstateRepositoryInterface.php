<?php
//App\Infrastructure\Repositories\Interfaces\RealEstateRepositoryInterface.php
namespace App\Infrastructure\Repositories\Interfaces;

interface RealEstateRepositoryInterface
{
    public function paginateRealEstates(int $perPage): \Illuminate\Contracts\Pagination\Paginator;
}
