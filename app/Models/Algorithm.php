<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Algorithm extends Model
{
    protected $fillable = [
        'name',
    ];

    public function minings()
    {
        return $this->hasMany(Mining::class, 'algorithm_id');
    }
}
