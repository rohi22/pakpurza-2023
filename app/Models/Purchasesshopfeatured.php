<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasesshopfeatured extends Model
{
    use HasFactory;

    protected $table = 'purchases_shop_featured_listings';
    protected $guarded = ['*'];
}
