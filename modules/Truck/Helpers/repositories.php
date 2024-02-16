<?php

declare(strict_types=1);

use Modules\Truck\Contracts\Repositories\V1\TruckRepository;

if ( ! function_exists('truck')) {
    /**
     * Get the truck repo.
     */
    function truck(): TruckRepository
    {
        return resolve(TruckRepository::class);
    }
}
