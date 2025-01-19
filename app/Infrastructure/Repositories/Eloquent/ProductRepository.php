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

        // دمج بيانات المنتج الفرعي مع المنتج الرئيسي
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

    public function findProductByIdTypeAndName($id, $type, $name)
{
    // أولاً: البحث عن المنتج في جدول 'products' باستخدام 'id' و 'product_type'
    $product = Product::where('id', $id)
                      ->where('product_type', $type)
                      ->with([
                          'cars', 
                          'electricalAppliances', 
                          'homeAppliances', 
                          'realEstate'
                      ])
                      ->first();

    if (!$product) {
        return null; // إذا لم يتم العثور على المنتج، أرجع null
    }

    // ثانيًا: تحديد الجدول المناسب بناءً على 'product_type'
    $relatedModel = null;
    switch ($type) {
        case 'cars':
            $relatedModel = Car::class;
            break;
        case 'electricalAppliances':
            $relatedModel = ElectricalAppliance::class;
            break;
        case 'homeAppliances':
            $relatedModel = HomeAppliance::class;
            break;
        case 'realEstate':
            $relatedModel = RealEstate::class;
            break;
    }

    if (!$relatedModel) {
        return null; 
    }

    // ثالثًا: البحث في الجدول المرتبط باستخدام 'product_name'
    $relatedProduct = $relatedModel::where('product_id', $product->id)
                                   ->where('product_name', $name)
                                   ->first();

    return $relatedProduct; // إرجاع المنتج المرتبط إذا تم العثور عليه
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
