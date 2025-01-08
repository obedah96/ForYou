<?php
// App\Application\UseCases\Product\AddProduct.php
namespace App\Application\UseCases\Products;

use App\Infrastructure\Repositories\Interfaces\ProductRepositoryInterface;

class AddProduct
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(array $data)
    {
        return $this->productRepository->create($data);
    }
}
