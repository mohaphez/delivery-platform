<?php

declare(strict_types=1);

namespace Modules\Tenant\Filament\Manager\Resources\TenantResource\Pages;

use Modules\Tenant\Filament\Manager\Resources\TenantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTenant extends EditRecord
{
    protected static string $resource = TenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
