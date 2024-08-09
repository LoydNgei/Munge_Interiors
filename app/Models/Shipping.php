<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $primaryKey = 'shipping_id';

    protected $fillable = [
        'order_id',
        'user_id',
        'shipping_address',
        'shipping_status',
        'tracking number',
        'shipped_at',
        'delivered_at'
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
