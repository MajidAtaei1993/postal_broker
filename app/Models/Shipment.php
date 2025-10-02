<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipment extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'tracking_code',
        'service_type',
        'status'
    ];

    // Status constants
    public const STATUS_PENDING   = 'pending';
    public const STATUS_SHIPPED   = 'shipped';
    public const STATUS_DELIVERED = 'delivered';

    public const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_SHIPPED,
        self::STATUS_DELIVERED,
    ];

    // Service type constants
    public const SERVICE_STANDARD      = 'standard';
    public const SERVICE_EXPRESS       = 'express';
    public const SERVICE_PRIORITY      = 'priority';
    public const SERVICE_INTERNATIONAL = 'international';

    public const SERVICE_TYPES = [
        self::SERVICE_STANDARD,
        self::SERVICE_EXPRESS,
        self::SERVICE_PRIORITY,
        self::SERVICE_INTERNATIONAL,
    ];

    //  helper methods to check status
    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isShipped(): bool
    {
        return $this->status === self::STATUS_SHIPPED;
    }

    public function isDelivered(): bool
    {
        return $this->status === self::STATUS_DELIVERED;
    }

    // Helper methods for service types
    public function isStandard(): bool
    {
        return $this->service_type === self::SERVICE_STANDARD;
    }
    
    public function isExpress(): bool
    {
        return $this->service_type === self::SERVICE_EXPRESS;
    }

    public function isPriority(): bool
    {
        return $this->service_type === self::SERVICE_PRIORITY;
    }

    public function isInternational(): bool
    {
        return $this->service_type === self::SERVICE_INTERNATIONAL;
    }


    // this command run before data store in data base 
    // create random unique 24 length number for tracking_code
    protected static function booted()
    {
        static::creating(function ($shipment) {
            // check tracking_code might be empty
            if (!$shipment->tracking_code) {
                $shipment->tracking_code = self::generateNumericTrackingCode();
            }
        });
    }

    // this function create 24 length number for use in $fillable
    protected static function generateNumericTrackingCode() {
        $tracking_code = '';

        for ($i=0; $i < 24; $i++) { 
            $tracking_code .= mt_rand(0, 9);
        }

        return $tracking_code;
    }

    // each shipment have 1 sender and receiver
    public function sender(): BelongsTo
    {
        return $this->belongsTo(Sender::class);
    }
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Receiver::class);
    }

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }
}
