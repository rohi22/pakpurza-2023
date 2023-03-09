<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bannerslots extends Model
{
    use HasFactory;

    
    protected $table = 'banner_slots';
    protected $guarded = ['*'];

   
}
