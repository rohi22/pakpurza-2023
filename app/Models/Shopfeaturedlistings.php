<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shopfeaturedlistings extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'shop_featured_listings';
    protected $guarded = ['*'];
}
