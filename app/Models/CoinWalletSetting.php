<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoinWalletSetting extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'coin_wallet_settings';
    protected $guarded = ['*'];
}
