<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'pTitle',
        'type',
        'pCategory',
        'pSubCategory',
        'qty',
        'sku',
        'stock',
        'pOldPrice',
        'pSellingPrice',
        'shortDescription',
        'longDescription',
        'label',
        'pImage',
        'todayDeal',
        'featured',
        'publish',
        'manu_name',
        'manu_brand',
        'vendorId',
        'colors',
        'size',
        'offline',
        'todayDeal',
        'publish',
        'bestOfWeek',
        'popular',
        'status',
        'rate',
    ];
}
