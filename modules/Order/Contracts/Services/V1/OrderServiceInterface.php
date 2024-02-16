<?php

declare(strict_types=1);

namespace Modules\Order\Contracts\Services\V1;


use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Contracts\Services\BaseServiceInterface;

interface OrderServiceInterface extends BaseServiceInterface
{

    /**
     * Get orders by client id
     * @param int $clientId
     * @return Collection|null
     */
    public function getOrdersByClientId(int $clientId): ?Collection;
}
