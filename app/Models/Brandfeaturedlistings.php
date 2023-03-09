<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brandfeaturedlistings extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'brand_featured_listings';
    protected $guarded = ['*'];

}
