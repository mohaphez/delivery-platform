<?php

declare(strict_types=1);

use Modules\Client\Contracts\Repositories\V1\ClientRepository;

if ( ! function_exists('client')) {
    /**
     * Get the _tenant repo.
     */
    function client(): ClientRepository
    {
        return resolve(ClientRepository::class);
    }
}
