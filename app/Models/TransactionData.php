<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionData extends Model
{
    use HasFactory;

    protected $table = 'transaction_data';
    protected $guarded =['*'];
    protected $dates = ['deleted_at'];
}
