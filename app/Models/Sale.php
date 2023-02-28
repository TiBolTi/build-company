<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['id', 'client_id', 'apartment_id', 'house_id', 'date_of_sale'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }

}
