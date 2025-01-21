<?php
//App\Infrastructure\Repositories\Eloquent\RealEstateRepository.php
namespace App\Infrastructure\Repositories\Eloquent;
use App\Infrastructure\Repositories\Interfaces\RealEstateRepositoryInterface;
use App\Domain\Entities\RealEstate;

class RealEstateRepository implements RealEstateRepositoryInterface
{
    public function paginateRealEstates(int $perPage): \Illuminate\Contracts\Pagination\Paginator
    {
        return RealEstate::select(
            'real_estate.product_id',
            'real_estate.product_name',
            'real_estate.price',
            'real_estate.image_path',
            'real_estate.product_city',
            'products.product_type' 
        )
        ->join('products', 'real_estate.product_id', '=', 'products.id')
        ->orderBy('real_estate.created_at', 'desc')
        ->paginate($perPage);
    
    }
}
