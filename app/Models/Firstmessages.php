<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firstmessages extends Model
{
    use HasFactory;
    protected $table = 'first_messages';
    protected $guarded = ['*'];
}
