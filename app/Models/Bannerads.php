<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bannerads extends Model
{
    use HasFactory,SoftDeletes;
    

    protected $table = 'banner_ads';
    protected $guarded = ['*'];
    protected $dates = ['deleted_at'];

}
