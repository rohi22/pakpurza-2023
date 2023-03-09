<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adbrand extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'ad_brands';
    protected $guarded = ['*'];

}
