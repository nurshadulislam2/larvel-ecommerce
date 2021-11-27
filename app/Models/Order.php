<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'price',
        'quantity',
        'name',
        'email',
        'mobile',
        'address',
        'truck_no',
        'payment_method',
        'txn_id',
        'status'
    ];
}