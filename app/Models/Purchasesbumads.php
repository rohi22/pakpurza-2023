<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasesbumads extends Model
{
    use HasFactory;

    protected $table = 'purchases_bump_ads';
    protected $guarded = ['*'];
}
