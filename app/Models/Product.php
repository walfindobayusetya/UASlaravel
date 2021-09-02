<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //khusus untuk input data cara ke 4
    protected $fillable = ['product_name', 'amount', 'unit', 'price'];
}