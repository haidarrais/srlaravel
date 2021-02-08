<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = [
        'title',
        'promo_code',
        'image',
        'description',
        'expired',
       ];
}
