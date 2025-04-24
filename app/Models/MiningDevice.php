<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiningDevice extends Model
{
    protected $fillable = [
        'company',
        'device_name',
        'cost',
        'power_consumption',
    ];

    protected $casts = [
        'cost' => 'float',
        'power_consumption' => 'float',
    ];

    public function minings()
    {
        return $this->hasMany(Mining::class, 'mining_device_id');
    }
}
