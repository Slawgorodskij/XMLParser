<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'city_id',
        'created_at',
        'updated_at',
    ];

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
