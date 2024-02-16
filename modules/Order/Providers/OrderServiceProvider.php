<?php

declare(strict_types=1);

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Order\Contracts\Repositories\V1\OrderRepository;
use Modules\Order\Contracts\Services\V1\OrderServiceInterface;
use Modules\Order\Repositories\V1\OrderRepository\OrderEloquentRepository;
use Modules\Order\Services\V1\OrderService;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerRepositories();
        $this->registerServices();
    }

    /**
     * Register module repositories.
     *
     * @return void
     */
    private function registerRepositories(): void
    {
        $this->app->bind(
            OrderRepository::class,
            OrderEloquentRepository::class
        );
    }

    /**
     * Register module services.
     *
     * @return void
     */
    private function registerServices(): void
    {
        $this->app->bind(
            OrderServiceInterface::class,
            OrderService::class
        );
    }
}
