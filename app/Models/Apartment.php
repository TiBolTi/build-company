<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['id', 'number', 'area', 'floor', 'rooms', 'house_id' ];

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

}
