<?php

declare(strict_types=1);

namespace Modules\Truck\Filament\Agent\Resources\TruckResource\Pages;

use Modules\Truck\Filament\Agent\Resources\TruckResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTruck extends EditRecord
{
    protected static string $resource = TruckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
