<?php

declare(strict_types=1);

namespace Modules\Filament\Contracts;

interface FilamentServiceInterface
{
    public function getModulesResources(): array;
}
