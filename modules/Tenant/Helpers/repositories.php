<?php

declare(strict_types=1);

use Modules\Tenant\Contracts\Repositories\V1\TenantRepository;

if ( ! function_exists('_tenant')) {
    /**
     * Get the _tenant repo.
     */
    function _tenant(): TenantRepository
    {
        return resolve(TenantRepository::class);
    }
}
