<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected $fillable = [
        'company-name',
        'name',
        'email',
        'phone-number',
        'street-and-number',
        'postal-code',
        'place',
        'refrence'
    ];

}
