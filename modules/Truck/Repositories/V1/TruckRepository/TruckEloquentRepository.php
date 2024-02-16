<?php

declare(strict_types=1);

namespace Modules\Truck\Repositories\V1\TruckRepository;

use Modules\Truck\Contracts\Repositories\V1\TruckRepository;
use Modules\Truck\Entities\V1\Truck;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

class TruckEloquentRepository extends BaseRepository implements CacheableInterface, TruckRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Truck::class;
    }
}
