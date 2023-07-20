<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['client_id', 'region', 'addres', 'phone', 'payment_type', 'total_sum'];
    protected $attributes=[
        'status'=>1
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
