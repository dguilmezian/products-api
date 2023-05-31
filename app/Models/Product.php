<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'decription',
        'image',
        'price',
        'price_sale',
        'id_category',
        'id_brand'
    ];

    public static function getProductQuery(){
        return Product::select(
            'products.name',
            'description',
            'image',
            'b.name as brand',
            'price',
            'price_sale',
            'c.name as category',
            'stock'
        )
            ->leftJoin('brands as b', 'b.id', 'products.id_brand')
            ->leftJoin('categories as c', 'c.id', 'products.id_category')
            ;
    }

}
