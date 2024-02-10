<?php

declare(strict_types=1);

namespace Modules\User\Enums\V1\AccountType;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum AccountType: int
{
    use CleanEnum;

    case Member = 0;
    case Manager = 1;
    case Sudo = 2;
    case System = 3;
}
