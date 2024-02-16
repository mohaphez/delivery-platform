<?php

declare(strict_types=1);

namespace Modules\Client\Filament\Manager\Resources\ClientResource\Pages;

use Modules\Client\Filament\Manager\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClients extends ListRecords
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
