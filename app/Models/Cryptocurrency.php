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

    protected $casts = [
        'network_difficulty' => 'float',
        'block_reward' => 'float',
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
