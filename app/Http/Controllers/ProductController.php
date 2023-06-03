<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\ProductUpdateFormRequest;
use App\Models\Product;
use App\Models\ProductsAdmin;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $products = $request->has('search') ? ProductsAdmin::getAll($request->input('search')) : ProductsAdmin::getAll();

        return response()->json([$products], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductFormRequest $request)
    {
        $data = $request->all();
        $product = ProductsAdmin::store(
            $data['name'],
            $data['price'],
            $data['price_sale'],
            $data['category'],
            $data['brand'],
            $data['description'] ?? false,
            $data['image'] ?? false,
            $data['stock'] ?? false,

        );
        return response()->json([$product],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = ProductsAdmin::getProduct($id);
        return response()->json([$product], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateFormRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductUpdateFormRequest $request, int $id)
    {
        $data = $request->all();
        $product = Product::find($id);
        if($product){
            $product = ProductsAdmin::updateProduct(
                $product,
                $data['name'] ?? null,
                $data['price'] ?? null,
                $data['price_sale'] ?? null,
                $data['category'] ?? null,
                $data['brand'] ?? null,
                $data['description'] ?? null,
                $data['image'] ?? null,
                $data['stock'] ?? null,
            );
            return response()->json(['message'=>'Product Updated',$product],200);
        }

        return response()->json(['message'=>'Product not found'],404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product){
            $product->delete();
            return response()->json(['message'=>'Product Deleted'],200);
        }

        return response()->json(['message'=>'Product not found'],404);

    }
}
