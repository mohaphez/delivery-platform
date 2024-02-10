<?php

declare(strict_types=1);

namespace Modules\Filament\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Modules\Filament\Contracts\FilamentServiceInterface;
use Modules\Filament\Services\FilamentService;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->applyLanguageSwitch();
    }

    /**
     * Register any application service
     */
    public function register(): void
    {
        $this->app->bind(FilamentServiceInterface::class, FilamentService::class);
    }


    public function applyLanguageSwitch(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch): void {
            $switch
                ->locales(['nl', 'en', 'es', 'fr']);
        });
    }
}
