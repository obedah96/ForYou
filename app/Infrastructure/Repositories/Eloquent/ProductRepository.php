<?php
namespace App\Infrastructure\Repositories\Eloquent;

use App\Domain\Entities\Product;
use App\Domain\Entities\Car;
use App\Domain\Entities\ElectricalAppliance;
use App\Domain\Entities\HomeAppliance;
use App\Domain\Entities\RealEstate;
use App\Infrastructure\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function create(array $data): Product
    {
        $product = $this->model->create($data);

        $subProduct = $this->createSubProduct($product, $data);

        $product->subProduct = $subProduct;

        return $product;
    }

    public function createSubProduct(Product $product, array $data)
    {
        $subProductData = array_merge($data, ['product_id' => $product->id]);

        switch ($product->product_type) {
            case 'cars':
                return Car::create($subProductData);
            case 'electricalAppliances':
                return ElectricalAppliance::create($subProductData);
            case 'homeAppliances':
                return HomeAppliance::create($subProductData);
            case 'realEstate':
                return RealEstate::create($subProductData);
            default:
                throw new \Exception("Invalid product type");
        }
    }

        public function findProductByIdTypeAndName($id)
    {
        
        $product = Product::where('id', $id)->first();

        if (!$product) {
            return null;
        }

        
        $type = $product->product_type;

        $relatedModel = match($type) {
            'cars' => Car::class,
            'electricalAppliances' => ElectricalAppliance::class,
            'homeAppliances' => HomeAppliance::class,
            'realEstate' => RealEstate::class,
            default => null,
        };

        if (!$relatedModel) {
            return null;
        }

        
        $relatedProduct = $relatedModel::where('product_id', $product->id)->first();

        if (!$relatedProduct) {
            return null;
        }

        return [
            'product' => $product,
            'details' => $relatedProduct
        ];
    }



    public function getFilteredProducts($type, $priceMax, $city)
    {
        switch ($type) {
            case 'cars':
                $model = Car::query();
                break;
            case 'electricalAppliances':
                $model = ElectricalAppliance::query();
                break;
            case 'homeAppliances':
                $model = HomeAppliance::query();
                break;
            case 'realEstate':
                $model = RealEstate::query();
                break;
            default:
                return [];
        }

       
        if ($priceMax) {
            $model->where('price', '<=', $priceMax);
        }

        if ($city) {
            $model->where('product_city', 'like', '%' . $city . '%');
        }

        return $model->select('product_name', 'price', 'image_path', 'product_city')
                     ->orderBy('created_at', 'desc')
                     ->get();
    }
}
