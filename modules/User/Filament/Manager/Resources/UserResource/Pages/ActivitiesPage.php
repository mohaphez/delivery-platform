<?php

declare(strict_types=1);

namespace Modules\User\Filament\Manager\Resources\UserResource\Pages;

use JaOcero\ActivityTimeline\Pages\ActivityTimelinePage;
use Modules\ActivityLog\Filament\Manager\Concerns\HasActivitiesLogSetting;
use Modules\User\Filament\Manager\Resources\UserResource;

class ActivitiesPage extends ActivityTimelinePage
{
    use HasActivitiesLogSetting;

    protected static string $resource = UserResource::class;


}
