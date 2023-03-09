<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellNow extends Model
{
    use HasFactory;

    protected $table = 'sell_now';
    protected $guarded = ['*'];
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('\App\User','user_id');
    }
    
    // public function getCountry(){
    //     return $this->hasOne('App\Models\GeoCountry','id','country_id');
    // }

    // public function getState(){
    //     return $this->hasOne('App\Models\GeoState','id','state_id');
    // }

    // public function getCity(){
    //     return $this->hasOne('App\Models\GeoCity','id','city_id');
    // }

    // public function getCategory(){
    //     return $this->hasOne('App\Models\Category','id','category_id');
    // }

    // public function getSubCategory(){
    //     return $this->hasOne('App\Models\SubCategory','id','sub_category_id');
    // }
    
    // public function safepay(){
    //     return $this->hasMany(SafePay::class,'product_id');
    // }
}
