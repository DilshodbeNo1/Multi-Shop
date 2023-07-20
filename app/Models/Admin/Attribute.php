<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

     public function product_attributes()
    {
        return $this->hasMany(Product_attribute::class, 'attribute_id');
    }
    public function variants()
    {
        return $this->hasMany(Variant::class, 'attribute_id');
    }

    public function productVariants($ids)
    {
        return $this->variants->find($ids);
    }
}
