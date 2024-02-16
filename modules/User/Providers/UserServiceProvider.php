<?php

declare(strict_types=1);

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Contracts\Repositories\V1\UserRepository;
use Modules\User\Contracts\Services\UserServiceInterface;
use Modules\User\Repositories\V1\UserRepository\UserEloquentRepository;
use Modules\User\Services\V1\UserService;

class UserServiceProvider extends ServiceProvider
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
        $this->registerObservers();
    }

    /**
     * Register module repositories.
     *
     * @return void
     */
    private function registerRepositories(): void
    {
        $this->app->bind(UserRepository::class, UserEloquentRepository::class);
    }

    /**
     * Register module services.
     *
     * @return void
     */
    private function registerServices(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }


    /**
     * Register model observers
     */
    private function registerObservers(): void
    {

    }

}
