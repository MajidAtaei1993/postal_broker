<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sender extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'full_name',
        'mobile',
        'address',
        'zipde_code'
    ];

    // one to many releation
    // each sender can have more than 1 shipment
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class);
    }

    // one to many reletion
    // each sender can send more than 1 package
    public function packages()
    {
        return $this->hasManyThrough(Package::class, Shipment::class);
    }
}
