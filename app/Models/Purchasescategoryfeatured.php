<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasescategoryfeatured extends Model
{
    use HasFactory;

    protected $table = 'purchases_category_featured_listings';
    protected $guarded = ['*'];
}
