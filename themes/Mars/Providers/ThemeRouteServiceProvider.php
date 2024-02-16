<?php

namespace Themes\Mars\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Tenant\Entities\V1\Tenant;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;

class ThemeRouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapRoutes();
    }

    /**
     * Map routes of the current theme.
     */
    private function mapRoutes(): void
    {
        $base = base_path('themes/Mars');
        $this->mapPublicRoutes("$base/Routes/web.php");
        $this->mapApiRoutes("$base/Routes/api.php");
    }

    /**
     * Map public routes.
     */
    private function mapPublicRoutes(string $path): void
    {
        if (!file_exists($path))
            return;

        Route::group(
            [
                'middleware' => [
                    'web',
                    'universal',
                    InitializeTenancyByDomain::class,
                ],
            ],
            fn() => require $path,
        );
    }

    /**
     * Map api routes.
     */
    private function mapApiRoutes($path): void
    {
        if (!file_exists($path))
            return;

        Route::group(
            [
                'prefix'     => 'api',
                'middleware' => [
                    'universal',
                    InitializeTenancyByDomain::class,
                    'api'
                ],
            ],
            fn() => require $path,
        );
    }
}
