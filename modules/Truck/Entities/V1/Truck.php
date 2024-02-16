<?php

declare(strict_types=1);

namespace Modules\Truck\Entities\V1;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Entities\V1\BaseModel;
use Modules\Support\Enums\V1\Status\Status;
use Modules\User\Entities\V1\User;
use Modules\User\Enums\V1\AccountType\AccountType;

class Truck extends BaseModel
{
    protected $fillable = [
        'name',
        'brand',
        'model',
        'plate_number',
        'color',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id', 'id')
            ->where('account_type', AccountType::Driver);
    }
}
