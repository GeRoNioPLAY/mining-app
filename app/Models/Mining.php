<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mining extends Model
{
    protected $fillable = [
        'user_id',
        'mining_device_id',
        'cryptocurrency_id',
        'algorithm_id',
        'hashrate',
    ];

    protected $casts = [
        'hashrate' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function miningDevice()
    {
        return $this->belongsTo(MiningDevice::class);
    }

    public function algorithm()
    {
        return $this->belongsTo(Algorithm::class);
    }

    public function cryptocurrency()
    {
        return $this->belongsTo(Cryptocurrency::class);
    }
}
