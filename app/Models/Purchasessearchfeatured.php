<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasessearchfeatured extends Model
{
    use HasFactory;

    protected $table = 'purchases_search_featured_listings';
    protected $guarded = ['*'];
}
