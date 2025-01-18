<?php
//App\Application\UseCases\Products\FindProductUseCase.php
namespace App\Application\UseCases\Products;

use App\Infrastructure\Repositories\Interfaces\ProductRepositoryInterface;

class FindProductUseCase
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute($id, $type, $name)
    {
        return $this->productRepository->findProductByIdTypeAndName($id, $type, $name);
    }
}
