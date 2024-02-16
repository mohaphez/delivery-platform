<?php

declare(strict_types=1);

namespace Modules\User\Filament\Agent\Resources\UserResource\Pages;

use Modules\User\Filament\Agent\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
