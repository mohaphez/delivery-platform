<?php

declare(strict_types=1);

namespace Modules\Tenant\Filament\Manager\Resources\TenantResource\Pages;

use Modules\Tenant\Filament\Manager\Resources\TenantResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;
}
