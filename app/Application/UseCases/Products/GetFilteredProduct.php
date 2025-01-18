<?php
//App\Application\UseCases\Products\GetFilteredProduct.php
namespace App\Application\UseCases\Products;

use App\Infrastructure\Repositories\Interfaces\ProductRepositoryInterface;

class GetFilteredProduct
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductsByType($type, $priceMax = null, $city = null)
    {
        return $this->productRepository->getFilteredProducts($type, $priceMax, $city);
    }
}
