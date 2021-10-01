<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'poedercoat',
        'poedercoat10',
        'kopschotten',
        'antiDreun',
        'koppelstukken',
        'ankers',
        'hoekstukken',
    ];

}
