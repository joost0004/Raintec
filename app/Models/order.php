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

    protected $casts = [
        'A' => 'array',
        'B' => 'array',
        'C' => 'array',
        'afschot' => 'array',
        'length' => 'array',
        'amount' => 'array',
    ];

    protected $fillable = [
        'A',
        'B',
        'C',
        'afschot',
        'length',
        'amount',
        'powdercoat',
        'RAL',
        'matte',
        'fine',
        'seasidePrep',
        'kopschotten',
        'antiDreun',
        'koppelstukken',
        'ankers',
        'hoekstukken',
        'imageName',
        'file-path',
        'status',
        'notes',
        'customerId'
    ];
}
