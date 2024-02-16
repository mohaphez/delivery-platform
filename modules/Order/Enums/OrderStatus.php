<?php

declare(strict_types=1);

namespace Modules\Order\Enums;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum OrderStatus: int
{
    use CleanEnum;

    case Pending = 1;
    case Canceled = 2;
    case Delivered = 3;
    case In_progress = 4;
}
