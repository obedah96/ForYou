<?php
//app\Infrastructure\Repositories\Interfaces\ProductRepositoryInterface.php
namespace App\Infrastructure\Repositories\Interfaces;
use App\Domain\Entities\Product;
interface ProductRepositoryInterface
{
    public function create(array $data):Product;
    public function createSubProduct(Product $product, array $data);

    public function findProductByIdTypeAndName($id, $type, $name);

    public function getFilteredProducts($type, $priceMax, $city);

}
