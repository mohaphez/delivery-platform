<?php

declare(strict_types=1);

namespace Modules\Truck\Services\V1;

use Modules\Base\Services\V1\BaseService;
use Modules\Truck\Contracts\Services\V1\TruckServiceInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class TruckService extends BaseService implements TruckServiceInterface
{
    public function model(): RepositoryInterface
    {
        return truck();
    }

}
