<?php

declare(strict_types=1);

namespace Modules\Client\Services\V1;

use Modules\Base\Services\V1\BaseService;
use Modules\Client\Contracts\Services\V1\ClientServiceInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class ClientService extends BaseService implements ClientServiceInterface
{
    public function model(): RepositoryInterface
    {
        return client();
    }

}
