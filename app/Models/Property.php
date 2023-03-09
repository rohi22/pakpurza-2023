<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'properties';
    protected $guarded = ['*'];
    protected $dates = ['deleted_at'];


    public function getAttributeType()
    {
        return $this->hasOne('App\Models\AttributeType', 'id', 'attribute_type_id');
    }
 
}
