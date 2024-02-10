<?php

declare(strict_types=1);

namespace Modules\Tenant\Services\V1;

use Modules\Base\Services\V1\BaseService;
use Modules\Tenant\Contracts\Services\V1\TenantServiceInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class TenantService extends BaseService implements TenantServiceInterface
{
    public function model(): RepositoryInterface
    {
        return _tenant();
    }

}
