<?php

declare(strict_types=1);

namespace Modules\Tenant\Repositories\V1\TenantRepository;

use Modules\Tenant\Contracts\Repositories\V1\TenantRepository;
use Modules\Tenant\Entities\V1\Tenant;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

class TenantEloquentRepository extends BaseRepository implements CacheableInterface, TenantRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Tenant::class;
    }
}
