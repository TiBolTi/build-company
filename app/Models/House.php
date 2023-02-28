<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['id', 'name', 'floors', 'price', 'year_of_construction'];
    public function apartment()
    {
        return $this->hasMany(Apartment::class);
    }
    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

}
