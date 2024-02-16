<?php

declare(strict_types=1);

namespace Modules\User\Enums\V1\AccountType;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum AccountType: int
{
    use CleanEnum;

    case Driver = 0;
    case Client = 1;
    case Agent = 2;
    case Manager = 3;
    case Sudo = 4;
    case System = 5;
}
