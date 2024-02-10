<?php

declare(strict_types=1);

use Modules\User\Contracts\Repositories\V1\UserRepository;

if ( ! function_exists('user')) {
    /**
     * Get the user repo.
     */
    function user(): UserRepository
    {
        return resolve(UserRepository::class);
    }
}
