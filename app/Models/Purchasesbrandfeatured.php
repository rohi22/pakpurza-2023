<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasesbrandfeatured extends Model
{
    use HasFactory;
    
    protected $table = 'purchases_brand_featured_listings';
    protected $guarded = ['*'];
    
}
