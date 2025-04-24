<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    protected $fillable = [
        'name',
        'network_difficulty',
        'block_reward',
    ];

    public function cryptocurrencyLists()
    {
        return $this->hasMany(CryptocurrencyList::class, 'cryptocurrency_id');
    }

    public function minings()
    {
        return $this->hasMany(Mining::class, 'cryptocurrency_id');
    }
}
