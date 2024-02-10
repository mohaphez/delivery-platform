<?php

declare(strict_types=1);

namespace Modules\User\DTOs\V1;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

#[MapInputName(SnakeCaseMapper::class)]
class ProfileDTO extends Data
{
    public function __construct(
        public string  $name,
        public ?string $mobile,
        public ?string $password,
    ) {
    }
}
