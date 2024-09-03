<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'street',
        'city',
        'region',
        'country',
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
