<?php

declare(strict_types=1);

namespace Modules\Order\Repositories\V1\OrderRepository;

use Modules\Order\Contracts\Repositories\V1\OrderRepository;
use Modules\Order\Entities\V1\Order;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

class OrderEloquentRepository extends BaseRepository implements CacheableInterface, OrderRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Order::class;
    }
}
