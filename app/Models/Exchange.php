<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $fillable = [
        'name',
    ];

    public function cryptocurrencyLists()
    {
        return $this->hasMany(CryptocurrencyList::class, 'exchange_id');
    }
}
