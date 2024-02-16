<?php

declare(strict_types=1);


use Modules\Order\Contracts\Services\V1\OrderServiceInterface;

if ( ! function_exists('orderService')) {
    /**
     * Get the order service.
     */
    function orderService(): OrderServiceInterface
    {
        return resolve(OrderServiceInterface::class);
    }
}
