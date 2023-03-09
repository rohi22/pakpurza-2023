<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attributes extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'attributes';
    protected $guarded = ['*'];
    protected $dates = ['deleted_at'];


    public function getAttributeType()
    {
        return $this->hasOne('App\Models\AttributeType', 'id', 'attribute_type_id');
    }
}
