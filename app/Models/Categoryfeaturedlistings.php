<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoryfeaturedlistings extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'category_featured_listings';
    protected $guarded = ['*'];

}