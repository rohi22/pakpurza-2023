<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellnowSetting extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'sellnow_settings';
    protected $guarded = ['*'];
    protected $dates = ['deleted_at'];
}
