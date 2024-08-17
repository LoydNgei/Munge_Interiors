<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $primaryKey = 'billing_id';

    protected $fillable = [
        'user_id',
        'billing_address',
        'user_card_number'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
