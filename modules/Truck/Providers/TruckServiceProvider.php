<?php

declare(strict_types=1);

namespace Modules\Truck\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Truck\Contracts\Repositories\V1\TruckRepository;
use Modules\Truck\Contracts\Services\V1\TruckServiceInterface;
use Modules\Truck\Repositories\V1\TruckRepository\TruckEloquentRepository;
use Modules\Truck\Services\V1\TruckService;

class TruckServiceProvider extends ServiceProvider
{
    public static string $controllerNamespace = '';

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
            TruckRepository::class,
            TruckEloquentRepository::class
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
            TruckServiceInterface::class,
            TruckService::class
        );
    }
}
