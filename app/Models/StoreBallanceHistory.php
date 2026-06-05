<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreBallanceHistory extends Model
{
    protected $fillable = [
        'store_balance_id',
        'type',
        'reference_id',
        'reference_type',
        'amount',
        'remarks',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
