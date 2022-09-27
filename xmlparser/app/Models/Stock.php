<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'model_id',
        'salon_id',
        'year',
        'price',
        'quantity',
        'reserved',
        'desc',
        'created_at',
        'updated_at',
    ];
}
