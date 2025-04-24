<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptocurrencyList extends Model
{
    protected $fillable = [
        'cryptocurrency_id',
        'exchange_id',
        'price',
    ];

    protected $casts = [
        'price' => 'float',
    ];

    public function cryptocurrency()
    {
        return $this->belongsTo(Cryptocurrency::class);
    }

    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }
}
