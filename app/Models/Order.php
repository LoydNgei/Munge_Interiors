<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    protected $primaryKey = 'order_id';

    protected $fillable = [
        // 'order_id',
        'user_id',
        'total_amount',
        'order_status',
        'payment_status',

    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class, 'order_id');
    }
}

