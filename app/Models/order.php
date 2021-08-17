<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customers() {
        return $this->hasOne(Customer::class);
    }

    protected $fillable = [
        'A',
        'B',
        'C',
        'afschot',
        'length',
        'ammount',
        'powdercoat',
        'RAL',
        'matte',
        'fine',
        'seaside-prep',
        'kopschoten',
        'anti-dreun',
        'koppelstukken',
        'ankers',
        'hoekstukken',
        'image-name',
        'file-path',
        'status'
    ];
}
