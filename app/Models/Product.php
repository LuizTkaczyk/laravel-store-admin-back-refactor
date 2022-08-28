<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable =[
        'name',
        'value',
        'quantity',
        'buy_value',
        'percentage',
        'sell_value',
        'code'
    ];
}
