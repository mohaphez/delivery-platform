<?php

declare(strict_types=1);

namespace Modules\Client\Filament\Manager\Resources\ClientResource\Pages;

use Modules\Client\Filament\Manager\Resources\ClientResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;
}
