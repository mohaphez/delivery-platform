<?php

declare(strict_types=1);

namespace Modules\Order\Entities\V1;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Entities\V1\BaseModel;
use Modules\Order\Enums\OrderStatus;
use Modules\Support\Enums\V1\Status\Status;
use Modules\Truck\Entities\V1\Truck;
use Modules\User\Entities\V1\User;

class Order extends BaseModel
{
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model): void {
            $model->user_id = auth()->id();
        });
    }

    protected $fillable = [
        'truck_id',
        'client_id',
        'user_id',
        'fuel_volume',
        'unit_price',
        'total_price',
        'latitude',
        'longitude',
        'address',
        'status',
        'delivery_date',
        'canceled_at',
        'delivered_at',
    ];

    protected $casts = [
        'status'        => OrderStatus::class,
        'delivery_date' => 'datetime',
        'canceled_at'   => 'datetime',
        'delivered_at'  => 'datetime',
    ];

    public function truck(): BelongsTo
    {
        return $this->belongsTo(Truck::class, 'truck_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
}
