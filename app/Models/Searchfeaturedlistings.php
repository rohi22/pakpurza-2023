<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Searchfeaturedlistings extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'search_featured_listings';
    protected $guarded = ['*'];
}


