<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allattributes extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'all_attributes';
    protected $guarded = ['*'];


    public function getAttributeType()
    {
        return $this->hasOne('App\Models\AttributeType', 'id', 'attribute_type_id');
    }
}
