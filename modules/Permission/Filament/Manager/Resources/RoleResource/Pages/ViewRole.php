<?php

declare(strict_types=1);

namespace Modules\Permission\Filament\Manager\Resources\RoleResource\Pages;

use Modules\Permission\Filament\Manager\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRole extends ViewRecord
{
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
