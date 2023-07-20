<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    use HasFactory;
    protected $fillable=['product_id', 'image'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
