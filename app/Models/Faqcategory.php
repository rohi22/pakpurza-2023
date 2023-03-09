<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Faqcategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'faq_category';
    protected $guarded = ['*'];
    protected $dates = ['deleted_at'];
}
