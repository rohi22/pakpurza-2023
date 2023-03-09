<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositLimit extends Model
{
    use HasFactory;
    protected $table = 'deposit_limit';
    protected $guarded = ['*'];
}
