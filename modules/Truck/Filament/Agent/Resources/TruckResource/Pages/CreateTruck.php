<?php

declare(strict_types=1);

namespace Modules\Truck\Filament\Agent\Resources\TruckResource\Pages;

use Modules\Truck\Filament\Agent\Resources\TruckResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTruck extends CreateRecord
{
    protected static string $resource = TruckResource::class;
}
