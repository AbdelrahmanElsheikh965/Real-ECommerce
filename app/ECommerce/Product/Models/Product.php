<?php

namespace App\ECommerce\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = ['size' => 'array'];

    public function subCategory()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withPivot(['quantity', 'product_total_price']);
    }

    public function related(Product $product)
    {
        return [
                Product::where('sub_category_id', $product->sub_category_id)
                        ->where('id', '!=', $product->id)->latest()->take(4)->get()
            ];
    }

    public function getCount($subCategory)
    {
        return self::where('sub_category_id', $subCategory)->count();
    }
}
