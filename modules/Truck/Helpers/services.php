<?php

declare(strict_types=1);


use Modules\Truck\Contracts\Services\V1\TruckServiceInterface;

if ( ! function_exists('truckService')) {
    /**
     * Get the truck service.
     */
    function truckService(): TruckServiceInterface
    {
        return resolve(TruckServiceInterface::class);
    }
}
