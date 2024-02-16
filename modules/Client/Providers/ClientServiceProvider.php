<?php

declare(strict_types=1);

namespace Modules\Client\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Client\Contracts\Repositories\V1\ClientRepository;
use Modules\Client\Contracts\Services\V1\ClientServiceInterface;
use Modules\Client\Repositories\V1\ClientRepository\ClientEloquentRepository;
use Modules\Client\Services\V1\ClientService;

class ClientServiceProvider extends ServiceProvider
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
            ClientRepository::class,
            ClientEloquentRepository::class
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
            ClientServiceInterface::class,
            ClientService::class
        );
    }
}
