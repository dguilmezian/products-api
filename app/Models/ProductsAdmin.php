<?php

namespace App\Models;

class ProductsAdmin
{
    public static function getAll($search = false)
    {
        $query = Product::getProductQuery();

        if($search){
            $search = trim($search, '"');

            $query->where('products.name', 'LIKE', '%'. $search .'%');
        }
        return $query->paginate(10);
    }

    public static function getProduct(int $id)
    {
        return Product::getProductQuery()->where('products.id',$id)->first();
    }

    public static function store($name, $price, $price_sale, $category_name, $brand_name, $description = false, $image = false,$stock = false)
    {
        $product = new Product();
        $product->name=$name;
        $product->price=$price;
        $product->price_sale=$price_sale;
        $product->description=$description;
        $product->image=$image;
        $product->stock=$stock;
        try{
            $brand_name = trim($brand_name, '"');
            $category_name = trim($category_name, '"');

            $brand = Brand::where('name','=',$brand_name)->first();
            if (!$brand){
                $brand=new Brand();
                $brand->name=$brand_name;

                $brand->save();
            }

            $category = Category::where('name','=',$category_name)->first();
            if (!$category){
                $category=new Category();
                $category->name=$category_name;
                $category->save();
            }

            $product->id_brand=$brand->id;
            $product->id_category=$category->id;

            $product->save();
        }catch (\Exception $exception){
            die($exception);
        }

        return Product::getProductQuery()->where('products.id',$product->id)->first();
    }

    public static function updateProduct($product, $name, $price, $price_sale, $category_name, $brand_name, $description, $image, $stock)
    {
        if ($name) {
            $product->name = $name;
        }
        if ($description) {
            $product->description = $description;
        }
        if ($image) {
            $product->image = $image;
        }
        if ($price) {
            $product->price = $price;
        }
        if ($price_sale) {
            $product->price_sale = $price_sale;
        }
        if ($category_name) {
            $category = Category::where('name','=',$category_name)->first();
            if (!$category){
                $category=new Category();
                $category->name=$category_name;
                $category->save();
            }
            $product->id_category=$category->id;

        }
        if ($brand_name) {
            $brand = Brand::where('name','=',$brand_name)->first();
            if (!$brand){
                $brand=new Brand();
                $brand->name=$brand_name;

                $brand->save();
            }
            $product->id_brand=$brand->id;
        }
        $product->update();

        return  Product::getProductQuery()->where('products.id',$product->id)->first();;
    }

}
