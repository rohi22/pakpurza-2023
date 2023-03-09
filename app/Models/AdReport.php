<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdReport extends Model
{
    use HasFactory;
    protected $table = 'ad_report';
    protected $guarded = ['*'];
}
