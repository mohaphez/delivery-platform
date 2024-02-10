<?php

declare(strict_types=1);


use Modules\Tenant\Contracts\Services\V1\TenantServiceInterface;

if ( ! function_exists('tenantService')) {
    /**
     * Get the user service.
     */
    function tenantService(): TenantServiceInterface
    {
        return resolve(TenantServiceInterface::class);
    }
}
