<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paymentlist extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'payment_list';
    protected $guarded = ['*'];
    protected $dates = ['deleted_at'];
}
