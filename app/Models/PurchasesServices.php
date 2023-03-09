<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesServices extends Model
{
    use HasFactory;

    protected $table = 'brand_featured_listings';
    protected $guarded = ['*'];
}
