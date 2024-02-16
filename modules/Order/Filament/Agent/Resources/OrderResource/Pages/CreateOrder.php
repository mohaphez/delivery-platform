<?php

declare(strict_types=1);

namespace Modules\Order\Filament\Agent\Resources\OrderResource\Pages;

use Modules\Order\Filament\Agent\Resources\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
