<?php

declare(strict_types=1);


use Modules\Client\Contracts\Services\V1\ClientServiceInterface;

if ( ! function_exists('clientService')) {
    /**
     * Get the client service.
     */
    function clientService(): ClientServiceInterface
    {
        return resolve(ClientServiceInterface::class);
    }
}
