<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contactus extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'contact_us';
    protected $guarded = ['*'];
    protected $dates = ['deleted_at'];
}
