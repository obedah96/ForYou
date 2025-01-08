<?php
namespace App\Http\Controllers\ProductControllers;

use App\Http\Controllers\Controller;
use App\Application\UseCases\Products\AddProduct;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    protected $addProduct;

    public function __construct(AddProduct $addProduct)
    {
        $this->addProduct = $addProduct;
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
}
