<?php

declare(strict_types=1);

namespace Modules\Order\Filament\Agent\Resources\OrderResource\Pages;

use Modules\Order\Filament\Agent\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
