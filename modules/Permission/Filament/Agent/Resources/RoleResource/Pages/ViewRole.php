<?php

declare(strict_types=1);

namespace Modules\Permission\Filament\Agent\Resources\RoleResource\Pages;

use Modules\Permission\Filament\Agent\Resources\RoleResource;
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
