<?php
namespace App\Http\Controllers\ProductControllers;

use App\Http\Controllers\Controller;
use App\Application\UseCases\Products\AddProduct;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\JsonResponse;
use App\Application\UseCases\Products\FindProductUseCase;
use App\Application\UseCases\Products\GetFilteredProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $addProduct;
    protected $findProductUseCase;
    protected $getFilteredProduct;

    public function __construct(AddProduct $addProduct,FindProductUseCase $findProductUseCase,GetFilteredProduct $getFilteredProduct)
    {
        $this->addProduct = $addProduct;
        $this->findProductUseCase = $findProductUseCase;
        $this->getFilteredProduct=$getFilteredProduct;
    }

    public function store(ProductFormRequest $request): JsonResponse
    {
        $user = auth()->user();
        $username = $user->firstName . ' ' . $user->lastName;
        $data = $request->validated();
        $data['user_id'] = $user->id;
        $data['owner_name']=$username;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $path = $image->store("uploads/{$data['product_type']}", 'public');
        $data['image_path'] = $path;
    }
        $product = $this->addProduct->execute($data);

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    public function findProduct(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');
        $name = $request->input('name');

        $product = $this->findProductUseCase->execute($id, $type, $name);

        if ($product) {
            return response()->json($product);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }
    public function getProductsByType($type, Request $request)
    {
        $filteredProducts = $this->getFilteredProduct->getProductsByType(
            $type,
            $request->get('price_max'),
            $request->get('city')
        );

        return response()->json($filteredProducts);
    }
}
