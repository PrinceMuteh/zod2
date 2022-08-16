<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'pTitle',
        'pCategoty',
        'qty',
        'pOldPrice',
        'pSellingPrice',
        'shortDescription',
        'label',
        'pImage',
        'todayDeal',
        'featured',
        'publish',
        'manu_name',
        'manu_brand',
    ];
}
