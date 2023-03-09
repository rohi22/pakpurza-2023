<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationSlider extends Model
{
    use HasFactory;
    protected $table = 'application_slides';
    protected $guarded = ['*'];
    
}
