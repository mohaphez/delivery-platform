<?php

declare(strict_types=1);

namespace Modules\Order\Services\V1;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Services\V1\BaseService;
use Modules\Order\Contracts\Services\V1\OrderServiceInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class OrderService extends BaseService implements OrderServiceInterface
{
    public function model(): RepositoryInterface
    {
        return order();
    }

    public function getOrdersByClientId(int $clientId): ?Collection
    {
        return $this->model->findWhere(['client_id' => $clientId]);
    }
}
