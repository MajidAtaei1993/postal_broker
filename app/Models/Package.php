<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'shipment_id',
        'weight',
        'length',
        'width',
        'height',
        'package_type',
        'contents'
    ];

    // one to many shipment
    public function shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class);
    }
}
