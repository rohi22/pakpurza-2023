<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bumpupsetting extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'bump_up_setting';
    protected $dates = ['deleted_at'];
    
    
     public function getPage(){
        return $this->hasOne('App\Models\Pagelist','id','page_id');
    }

}
