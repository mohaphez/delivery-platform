<?php

declare(strict_types=1);

use Modules\Order\Contracts\Repositories\V1\OrderRepository;

if ( ! function_exists('order')) {
    /**
     * Get the order repo.
     */
    function order(): OrderRepository
    {
        return resolve(OrderRepository::class);
    }
}
