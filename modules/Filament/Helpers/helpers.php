<?php

declare(strict_types=1);
use Modules\Filament\Contracts\FilamentServiceInterface;

if ( ! function_exists('filamentService')) {
    /**
     * Get the filament service.
     */
    function filamentService(): FilamentServiceInterface
    {
        return resolve(FilamentServiceInterface::class);
    }
}
