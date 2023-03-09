<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Paymentsetting extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'payment_setting';
    protected $guarded = ['*'];
    protected $dates = ['deleted_at'];
    
    
     public function getPayment(){
        return $this->hasOne('App\Models\Paymentlist','id','payment_id');
    }
}
