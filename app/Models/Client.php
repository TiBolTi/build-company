<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['id', 'name', 'phone', 'email'];
    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
}

