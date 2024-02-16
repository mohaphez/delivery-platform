<?php

declare(strict_types=1);

namespace Modules\Permission\Filament\Manager\Resources\RoleResource\Pages;

use Modules\Permission\Filament\Manager\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
