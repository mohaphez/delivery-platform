<?php

declare(strict_types=1);

namespace Modules\User\Enums\V1\AccountStatus;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum AccountStatus: int
{
    use CleanEnum;

    case Free = 0;
    case Limited = 1;
    case Banned = 2;
    case Removed = 3;
    case Classified = 4;
}
