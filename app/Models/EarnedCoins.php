<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EarnedCoins extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'earned_coins';
    protected $dates = ['deleted_at'];

    public function getUser(){
        return $this->hasOne('App\User','id','user_id');
    }
}
