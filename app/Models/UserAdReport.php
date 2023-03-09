<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdReport extends Model
{
    use HasFactory;
    protected $table = 'user_ad_report';
    protected $guarded = ['*'];
}
