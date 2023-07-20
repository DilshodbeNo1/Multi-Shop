<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes');
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'product_variants');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_images()
    {
        return $this->hasMany(Product_image::class, 'product_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id');
    }

    public function getVariantIds()
    {
        return $this->variants->pluck('id');
    }



    
}
